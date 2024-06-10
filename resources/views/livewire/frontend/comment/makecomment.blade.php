{{-- <div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="mt-8 mb-8">
                <div class="rounded overflow-hidden shadow bg-white">
                    <div class="px-4 py-3">
                        <x-auth-session-status class="mb-4" :status="session('success')" />
                        <form wire:submit.prevent="save">
                            <div class="font-weight-bold fs-4 text-center">Leave a Comment</div>
                            <div class="font-weight-bold fs-4 mt-4">
                                <label for="name">Your name:</label>
                                <input wire:model.blur="name" name="name" placeholder="Mr. Name"
                                    class="ms-5 block w-50 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    type="text">
                            </div>
                            <div class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="font-weight-bold fs-4 mt-4">
                                <label for="email">Your email:</label>
                                <input wire:model.blur="email" name="email" placeholder="example@gmail.com"
                                    class="ms-5 block w-50 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    type="text">
                            </div>
                            <div class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="font-weight-bold fs-4 mt-4">
                                <label for="subject">Subject:</label>
                                <input wire:model.blur="subject" name="subject" placeholder="Subject"
                                    class="ms-5 block w-50 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    type="text">
                            </div>
                            <div class="text-danger">
                                @error('subject')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="font-weight-bold fs-4 mt-4">
                                <label for="textmessage">Your message (optional):</label>
                                <textarea wire:model.blur="textmessage" name="textmessage" id="message" cols="30" rows="10"
                                    placeholder="Description"
                                    class="ms-3 block w-50 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>
                            <div class="text-danger">
                                @error('textmessage')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="font-weight-bold fs-4 mt-4">
                                <button as="button"
                                    class="mt-4 mb-4 btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div>
    <div class="contact_message form">
        <h3>Tell us </h3>
        <x-auth-session-status class="mb-4" :status="session('success')" />
        <form wire:submit.prevent="save">
            <p>
                <label> Your Name (required)</label>
                <input wire:model.blur="name" name="name" placeholder="Mr. Name" type="text">
            </p>
            <div class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <p>
                <label> Your Email (required)</label>
                <input wire:model.blur="email" name="email" placeholder="example@gmail.com" type="email">
            </p>
            <div class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <p>
                <label> Subject (required)</label>
                <input wire:model.blur="subject" name="subject" placeholder="Subject" type="text">
            </p>
            <div class="text-danger">
                @error('subject')
                    {{ $message }}
                @enderror
            </div>
            <div class="contact_textarea">
                <label> Your Message</label>
                <textarea wire:model.blur="textmessage" name="textmessage" id="message" cols="30" rows="10"
                placeholder="Description" ></textarea>
            </div>
            <div class="text-danger">
                @error('textmessage')
                    {{ $message }}
                @enderror
            </div>
            <button type="submit"> Send</button>
            <p class="form-messege"></p>
        </form>

    </div>
</div>
