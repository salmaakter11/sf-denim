<div>
    @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
    @endphp
    <ul class="mr-1.5">

        <li class="bg-zinc-50 shadow-lg shadow-purple-500/50 rounded-xl m-[15px]">
            <input type="checkbox" id="generalsettings_li" class="absolute peer opacity-0"
                {{ $prefix == 'admin/generalsettings' ? 'checked' : '' }}>
            <label for="generalsettings_li" class="font-bold tracking-[1px] mx-[20px] h-[50px] flex items-center">Home
                Settings</label>
            <div class="absolute right-[30px] -mt-8 rotate-0 peer-checked:rotate-180">
                <ion-icon name="chevron-down-outline">
                </ion-icon>
            </div>
            <ul class="max-h-0 overflow-hidden peer-checked:max-h-full">
                <a wire:navigate.hover href="{{ route('banner.index') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'banner.index' || $route == 'banner.edit' ? 'bg-purple-500 text-white' : '' }} ">
                        Banner
                    </li>
                </a>
            </ul>
        </li>
        <li class="bg-zinc-50 shadow-lg shadow-purple-500/50 rounded-xl m-[15px]">
            <input type="checkbox" id="story_li" class="absolute peer opacity-0"
                {{ $prefix == 'admin/story' ? 'checked' : '' }}>
            <label for="story_li" class="font-bold tracking-[1px] mx-[20px] h-[50px] flex items-center">Story
                Settings</label>
            <div class="absolute right-[30px] -mt-8 rotate-0 peer-checked:rotate-180">
                <ion-icon name="chevron-down-outline">
                </ion-icon>
            </div>
            <ul class="max-h-0 overflow-hidden peer-checked:max-h-full">
                <a  href="{{ route('story.index') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'story.index' ? 'bg-purple-500 text-white' : '' }} ">
                        Story
                    </li>
                </a>
                {{-- <a wire:navigate.hover href="{{ route('story.client') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'story.client' ? 'bg-purple-500 text-white' : '' }} ">
                        Client
                    </li>
                </a> --}}
            </ul>
        </li>
        <li class="bg-zinc-50 shadow-lg shadow-purple-500/50 rounded-xl m-[15px]">
            <input type="checkbox" id="purpose_li" class="absolute peer opacity-0"
                {{ $prefix == 'admin/purpose' ? 'checked' : '' }}>
            <label for="purpose_li" class="font-bold tracking-[1px] mx-[20px] h-[50px] flex items-center">Purpose
                Settings</label>
            <div class="absolute right-[30px] -mt-8 rotate-0 peer-checked:rotate-180">
                <ion-icon name="chevron-down-outline">
                </ion-icon>
            </div>
            <ul class="max-h-0 overflow-hidden peer-checked:max-h-full">
                <a wire:navigate.hover href="{{ route('purpose.index') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'purpose.index' ? 'bg-purple-500 text-white' : '' }} ">
                        Purpose
                    </li>
                </a>
            </ul>
        </li>
        <li class="bg-zinc-50 shadow-lg shadow-purple-500/50 rounded-xl m-[15px]">
            <input type="checkbox" id="people_li" class="absolute peer opacity-0"
                {{ $prefix == 'admin/people' ? 'checked' : '' }}>
            <label for="people_li" class="font-bold tracking-[1px] mx-[20px] h-[50px] flex items-center">People
                Settings</label>
            <div class="absolute right-[30px] -mt-8 rotate-0 peer-checked:rotate-180">
                <ion-icon name="chevron-down-outline">
                </ion-icon>
            </div>
            <ul class="max-h-0 overflow-hidden peer-checked:max-h-full">
                <a wire:navigate.hover href="{{ route('people.index') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'people.index' ? 'bg-purple-500 text-white' : '' }} ">
                        People
                    </li>
                </a>
            </ul>
        </li>
        <li class="bg-zinc-50 shadow-lg shadow-purple-500/50 rounded-xl m-[15px]">
            <input type="checkbox" id="sustailability_li" class="absolute peer opacity-0"
                {{ $prefix == 'admin/sustailability' ? 'checked' : '' }}>
            <label for="sustailability_li"
                class="font-bold tracking-[1px] mx-[20px] h-[50px] flex items-center">Sustailability
                Settings</label>
            <div class="absolute right-[30px] -mt-8 rotate-0 peer-checked:rotate-180">
                <ion-icon name="chevron-down-outline">
                </ion-icon>
            </div>
            <ul class="max-h-0 overflow-hidden peer-checked:max-h-full">
                <a href="{{ route('sustailability.index') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'sustailability.index' ? 'bg-purple-500 text-white' : '' }} ">
                        Sustailability
                    </li>
                </a>
            </ul>
        </li>
        <li class="bg-zinc-50 shadow-lg shadow-purple-500/50 rounded-xl m-[15px]">
            <input type="checkbox" id="facility_li" class="absolute peer opacity-0"
                {{ $prefix == 'admin/facility' ? 'checked' : '' }}>
            <label for="facility_li" class="font-bold tracking-[1px] mx-[20px] h-[50px] flex items-center">Facility
                Settings</label>
            <div class="absolute right-[30px] -mt-8 rotate-0 peer-checked:rotate-180">
                <ion-icon name="chevron-down-outline">
                </ion-icon>
            </div>
            <ul class="max-h-0 overflow-hidden peer-checked:max-h-full">
                <a href="{{ route('facility.index') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'facility.index' ? 'bg-purple-500 text-white' : '' }} ">
                        Facility
                    </li>
                </a>
            </ul>
        </li>
        <li class="bg-zinc-50 shadow-lg shadow-purple-500/50 rounded-xl m-[15px]">
            <input type="checkbox" id="career_li" class="absolute peer opacity-0"
                {{ $prefix == 'admin/career' || $prefix == 'admin/contact' ? 'checked' : '' }}>
            <label for="career_li" class="font-bold tracking-[1px] mx-[20px] h-[50px] flex items-center">Career
                Settings</label>
            <div class="absolute right-[30px] -mt-8 rotate-0 peer-checked:rotate-180">
                <ion-icon name="chevron-down-outline">
                </ion-icon>
            </div>
            <ul class="max-h-0 overflow-hidden peer-checked:max-h-full">
                <a  href="{{ route('career.index') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'career.index' ? 'bg-purple-500 text-white' : '' }} ">
                        Career
                    </li>
                </a>
                <a wire:navigate.hover href="{{ route('contact.index') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'contact.index' ? 'bg-purple-500 text-white' : '' }} ">
                        Curriculum Vitae
                    </li>
                </a>
            </ul>
        </li>
        <li class="bg-zinc-50 shadow-lg shadow-purple-500/50 rounded-xl m-[15px]">
            <input type="checkbox" id="gallery_li" class="absolute peer opacity-0"
                {{ $prefix == 'admin/gallery' ? 'checked' : '' }}>
            <label for="gallery_li" class="font-bold tracking-[1px] mx-[20px] h-[50px] flex items-center">gallery
                Settings</label>
            <div class="absolute right-[30px] -mt-8 rotate-0 peer-checked:rotate-180">
                <ion-icon name="chevron-down-outline">
                </ion-icon>
            </div>
            <ul class="max-h-0 overflow-hidden peer-checked:max-h-full">
                <a wire:navigate.hover href="{{ route('gallery.index') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'gallery.index' ? 'bg-purple-500 text-white' : '' }} ">
                        gallery
                    </li>
                </a>
            </ul>
        </li>
        {{-- <li class="bg-zinc-50 shadow-lg shadow-purple-500/50 rounded-xl m-[15px]">
            <input type="checkbox" id="contact_li" class="absolute peer opacity-0"
                {{ $prefix == 'admin/contact' ? 'checked' : '' }}>
            <label for="contact_li" class="font-bold tracking-[1px] mx-[20px] h-[50px] flex items-center">Contact us Settings</label>
            <div class="absolute right-[30px] -mt-8 rotate-0 peer-checked:rotate-180">
                <ion-icon name="chevron-down-outline">
                </ion-icon>
            </div>
            <ul class="max-h-0 overflow-hidden peer-checked:max-h-full">
                <a wire:navigate.hover href="{{ route('contact.index') }}">
                    <li
                        class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'contact.index' ? 'bg-purple-500 text-white' : '' }} ">
                        Contact
                    </li>
                </a>
            </ul>
        </li> --}}

        @can('sitesettings')
            <li class="bg-zinc-50 shadow-lg shadow-purple-500/50 rounded-xl m-[15px]">
                <input type="checkbox" id="sitesettings_li" class="absolute peer opacity-0"
                    {{ $prefix == 'admin/sitesettings' ? 'checked' : '' }}>
                <label for="sitesettings_li" class="font-bold tracking-[1px] mx-[20px] h-[50px] flex items-center">Site
                    Settings</label>
                <div class="absolute right-[30px] -mt-8 rotate-0 peer-checked:rotate-180">
                    <ion-icon name="chevron-down-outline">
                    </ion-icon>
                </div>
                <ul class="max-h-0 overflow-hidden peer-checked:max-h-full">
                    @can('siteIndex')
                        <a wire:navigate.hover href="{{ route('sitesettings.index') }}">
                            <li
                                class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  {{ $route == 'sitesettings.index' ? 'bg-purple-500 text-white' : '' }} ">
                                Site Setting(সাইট সেটাপ)
                            </li>
                        </a>
                    @endcan
                    
                    @can('aboutus')
                        <a href="
                {{ route('aboutus.index') }}
                ">
                            <li
                                class="p-[10px] text-sm hover:bg-purple-700 hover:text-white rounded-lg  
                    {{ $route == 'aboutus.index' ? 'bg-purple-500 text-white' : '' }} 
                    ">
                                About us Setting
                            </li>
                        </a>
                    @endcan
                </ul>
            </li>
        @endcan

    </ul>
</div>
