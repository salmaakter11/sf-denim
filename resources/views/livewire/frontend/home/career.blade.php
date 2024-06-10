<div style="min-height: 830px;">
   
    <div>
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                <header class="bg-site header px-4 md:px-0" style="background-color: rgb(43, 67, 103);height: 173px;position: fixed;width: 100%;" id="myHeader">
                    <nav class="navbar">
                        <div class="container" >
                            <ul>
                                <li><a href="{{ route('aboutus') }}" class="text-white " >About Us</a></li>
                                <li><a href="{{ route('facility') }}" class="text-white ">Our Facility</a></li>
                                <li><a href="{{ route('sustailability') }}" class="text-white">Sustainability</a></li>
                                <li><a href="{{ route('gallery') }}" class="text-white">Gallery</a></li>
                                <li><a href="{{ route('career') }}" class="text-white active">Career</a></li>
                                <li><a href="{{ route('contact') }}" class="text-white">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>

                </header>
                <section class="main-body pt-32" style="padding-top: 20vh;">
                    <div class="container-xl">
                        @forelse ($jobs as $job)
                        <button class="accordion">
                            <div class="button-table">
                                <div>
                                    <span>{{ $job->title }}</span>
                                    <span>Published on : {{ $job->pdate }}</span>
                                    <span>Deadline: {{ $job->ddate }}</span>
                                </div>
                            </div>
                        </button>
                        <div class="panel">
                            <div class="job-post">
                                {!! $job->content !!}
                            </div>
                            <form wire:ignore method="post" action="{{ route('careerpost') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="job_post_id" id="job_post_id" value="{{ $job->id }}">
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input   type="text" name="fullname" class="form-control" id="fullname" value="{{ old('fullname') }}" 
                                        placeholder="Enter your name and surname" required="required">
                                        <div style="color: red;">
                                            @error('fullname')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" required="required">Email address:</label>
                                    <input   type="email" name="email" class="form-control" id="email"  value="{{ old('email') }}"
                                        aria-describedby="emailHelp" placeholder="Enter your email address">
                                        <div style="color: red;">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input   type="text" name="address" class="form-control" id="address" value="{{ old('address') }}"
                                        placeholder="1234 Main St">
                                        <div style="color: red;">
                                            @error('address')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="tel">Phone No:</label>
                                    <input   type="text" name="tel" class="form-control" id="tel" value="{{ old('tel') }}"
                                        placeholder="1234 Main St">
                                        <div style="color: red;">
                                            @error('tel')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="date_of_birth">Phone No:</label>
                                    <input   type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ old('date_of_birth') }}"
                                        placeholder="+8801x xx xxx xxx ">
                                        <div style="color: red;">
                                            @error('date_of_birth')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="mr-4">Upload your CV:</label>
                                    <input type="file" name="file" id="file" value="{{ old('file') }}" accept=".pdf,.doc,.docx">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="bu" class="btn btn-primary"><a href="{{ $job->bdjobs }}" target="_blank">Bd Jobs</a></button>
                            </form>
                        </div>
                        @empty
                            
                        @endforelse
                       
                    </div>
                </section>


            </div>
        </div>
    </div>
    
</div>