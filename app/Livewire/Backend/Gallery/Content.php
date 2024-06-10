<?php

namespace App\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\ProductImage;
use App\Models\Story;
use App\Models\temporaryImages;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Content extends Component
{
    use WithFileUploads;



    #[On('gallery_content')]

    public function render()
    {
        $product_image = ProductImage::where('product_id', 7)->get();
        return view('livewire.backend.gallery.content', [
            'product_image' => $product_image,
        ]);
    }
    public function CreateOrUpdate()
    {
        $temporaryImages = temporaryImages::all();
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('/public/images/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file, '/public/product/' . $temporaryImage->folder . '_' . $temporaryImage->file);
            ProductImage::create([
                'product_id' => 7,
                'name' => $temporaryImage->file,
                'path' => 'product/' . $temporaryImage->folder . '_' . $temporaryImage->file,
            ]);
            Storage::deleteDirectory('/public/images/tmp/' . $temporaryImage->folder);
            $temporaryImage->delete();
        }
            $notification = array(
                'message' => 'Gallery Page Updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('gallery.index')->with($notification);
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
