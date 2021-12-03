<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rooah! Guild - Axie Infinity Scholarship</title>
    <link rel="icon" type="image/x-icon" href="img/rooah-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200&display=swap"
        rel="stylesheet">

    <!--Styles--->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!--Toastr--->
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

</head>

<body>
    <div class="header">
        <img class="mx-auto d-block logo" src="{{ asset('img/logo_rooah.png') }}" alt="">
        <h1 class="text-center rooah-heading">ROOAH! GUILD</h1>
        <p class="text-center axie-heading">Axie Infinity Scholarship Request Form</p>
    </div>
    <div class="content">
        <div class="container">
            <form action="{{ route('submit.entry') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="full_name">FULL NAME <span class="asterik">*</span></label>
                            <input type="text" name="full_name" class="form-control" placeholder="Enter Full Name">
                            @error('full_name')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="age">AGE <span class="asterik">*</span></label>
                            <input type="number" name="age" class="form-control" placeholder="Enter Age">
                            @error('age')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="occupation">OCCUPATION <span class="asterik">*</span></label>
                            <input type="text" name="occupation" class="form-control" placeholder="Enter Occupation">
                            @error('occupation')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="gender">GENDER </label>
                            <select name="gender" class="form-control" id="">
                                <option value="--Select-Gender--">--Select-Gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('gender')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="email">EMAIL <span class="asterik">*</span></label>
                            <input type="text" name="email" class="form-control"
                                placeholder="Enter a Valid Email Address">
                            @error('email')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="country">COUNTRY <span class="asterik">*</span></label>
                            <input type="text" name="country" class="form-control" placeholder="Enter Country">
                            @error('country')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="english_level">ENGLISH LEVEL </label>
                            <select name="english_level" class="form-control" id="">

                                <option value="--Select-English--Level--">--Select-English--Level--</option>
                                <option value="Basic">Basic</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                                <option value="Native">Native</option>
                            </select>
                            @error('english_level')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="social_account">SOCIAL ACCOUNT (FACEBOOK, INSTAGRAM OR TWITTER. LINK PLEASE)
                                <span class="asterik">*</span></label>
                            <input type="text" name="social_account" class="form-control"
                                placeholder="Enter Social Networks">
                            @error('social_account')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="discord">DISCORD NAME + TAG (EG 'BEAST#1234') <span
                                    class="asterik">*</span></label>
                            <input type="text" name="discord" class="form-control" placeholder="Enter Discord Tag">
                            @error('discord')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label for="axie_played" class="mb-3">DO YOU HAVE EXPERIENCE PLAYING AXIE INFINITY
                                BEFORE?</label>
                            <div>
                                <input class="form-check-input" name="axie_played" type="radio" value="YES"> YES
                                <input class="form-check-input" name="axie_played" type="radio" value="NO"> NO
                            </div>
                            @error('axie_played')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="" class="mb-3">DO YOU UNDERSTAND THE RULES ABOUT GAMEPLAY, MULTIPLE ACCOUNTS,
                                BOTS
                                OR ANY OTHER EXPLOITS THAT WILL GET YOU BANNED?</label>
                            <div>
                                <input class="form-check-input" name="understand_game_rules" type="radio" value="YES">
                                YES
                                <input class="form-check-input" name="understand_game_rules" type="radio" value="NO"> NO
                                <input class="form-check-input" name="understand_game_rules" type="radio" value="NO">
                                NO, I would
                                like to get trained on this
                            </div>
                            @error('understand_game_rules')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="member" class="mb-3">ARE YOU A MEMBER OF ANOTHER SCHOLARSHIP?</label>
                            <div>
                                <input class="form-check-input" name="member" type="radio" value="YES"> YES
                                <input class="form-check-input" name="member" type="radio" value="NO"> NO

                            </div>
                            @error('member')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="experience">DO YOU HAVE EXPERIENCE PLAYING OTHER COMPETITIVE RANKED GAMES? IF SO
                                PLEASE
                                WHAT
                                WAS YOUR RANK? TALK ABOUT YOUR EXPERIENCE. <span class="asterik">*</span></label>
                            <input type="text" name="experience" class="form-control"
                                placeholder="Do you have any Experience">
                            @error('experience')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="playing_time">HOW MUCH TIME CAN YOU PLAY PER DAY? <span style="color:red">(1-11
                                    Hours)</span>
                            </label>
                            <input type="number" name="playing_time" class="form-control"
                                placeholder="How Much time can you play ">
                            @error('playing_time')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="comment">PLEASE PROVIDE ANY ADDITIONAL COMMENTS.
                            </label>
                            <textarea name="comment" class="form-control" cols="30" rows="5"
                                placeholder="Please provide any additional comments"> </textarea>
                            @error('comment')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-success submit-btn">SUBMIT</button>
                        </div>

                    </div>
            </form>


        </div>
    </div>
    </div>
    <div class="footer">
        <p class="text-center">Developed by <a href="https://rooah.com">Rooah!</a> with ❤</p>
        <p class="text-center">© Rooah! LLC, 2021</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}")
    </script>
    @endif

    {{-- toastr error --}}
    @if (Session::has('error'))
    <script>
        toastr.error("{!! Session::get('error') !!}")
    </script>
    @endif

    {{-- loop through errors and display on toastr --}}
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        toastr.error("{!! $error !!}")
    </script>
    @endforeach
    </div>
    @endif


</body>

</html>