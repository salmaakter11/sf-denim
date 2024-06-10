<?php

namespace App\Livewire\Backend\Story;

use App\Models\ProductImage;
use App\Models\Story;
use App\Models\temporaryImages;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Content extends Component
{
    use WithFileUploads;
    public $id;
    public $oldImage;
    #[Rule('nullable|sometimes|file|image|max:1024')] // 1MB Max
    public $image;

    #[Rule('required|max:250')]
    public $head;

    #[Rule('nullable')]
    public $content;

    public $story;
    
    public function mount()
    {
        $story = Story::findOrNew(1);
        $this->story=  $story; 
        $this->head = $story->head;
        $this->content = $story->content;
        $this->oldImage = $story->image;
    }
    #[On('story_content')]
    public function render()
    {
        $product_image = ProductImage::where('product_id', 1)->get();
        return view('livewire.backend.story.content',[
            'product_image' => $product_image,
        ]);
    }
    public function CreateOrUpdate(){
        $validated = $this->validate();
        $story = Story::first();
        if(empty($story)){
            $temporaryImages = temporaryImages::all();
            foreach ($temporaryImages as $temporaryImage) {
                Storage::copy('/public/images/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file, '/public/product/' . $temporaryImage->folder . '_' . $temporaryImage->file);
                ProductImage::create([
                    'product_id' => 1,
                    'name' => $temporaryImage->file,
                    'path' => 'product/' . $temporaryImage->folder . '_' . $temporaryImage->file,
                ]);
                Storage::deleteDirectory('/public/images/tmp/' . $temporaryImage->folder);
                $temporaryImage->delete();
            }
            Story::create($validated);           
            $notification = array(
                'message' => 'Out Story Page Updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('story.index')->with($notification);
            }
            else{
                $temporaryImages = temporaryImages::all();
                foreach ($temporaryImages as $temporaryImage) {
                    Storage::copy('/public/images/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file, '/public/product/' . $temporaryImage->folder . '_' . $temporaryImage->file);
                    ProductImage::create([
                        'product_id' => 1,
                        'name' => $temporaryImage->file,
                        'path' => 'product/' . $temporaryImage->folder . '_' . $temporaryImage->file,
                    ]);
                    Storage::deleteDirectory('/public/images/tmp/' . $temporaryImage->folder);
                    $temporaryImage->delete();
                }
        
            $story->update($validated);
            $notification = array(
                'message' => 'Story Page Updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('story.index')->with($notification);
        }
}
public function imageDelete($id)
{
    $product_image = ProductImage::find($id);
    try {
        unlink(storage_path('app/public/' . $product_image->path));
    } catch (\Exception $e) {
    }
    $product_image->delete();
    $this->dispatch('story_content');
    $this->js('toastr.options.timeOut = 10000');
    $this->js('toastr.info("Product Image deleted successfully.")');
}
}
