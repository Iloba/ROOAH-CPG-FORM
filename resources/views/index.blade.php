<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rooah! Guild - Axie Infinity Scholarship</title>
    <link rel="icon" type="image/x-icon" href="img/cp-icon.png">

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
        <img class="mx-auto d-block logo" src="{{ asset('img/cp-icon.png') }}" alt="">
        <h1 class="text-center rooah-heading">CRYPTOPIGGY GUILD</h1>
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
                            <input type="text" name="full_name" class="form-control" placeholder="Enter Full Name"
                                value="{{ old('full_name') }}">
                            @error('full_name')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="age">AGE <span class="asterik">*</span></label>
                            <input type="number" name="age" class="form-control" placeholder="Enter Age"
                                value="{{ old('age') }}">
                            @error('age')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="phone">TELEPHONE NUMBER (START WITH COUNTRY CODE) <span class="asterik">*</span></label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Telephone Number"
                                value="{{ old('age') }}">
                            @error('phone')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="occupation">OCCUPATION <span class="asterik">*</span></label>
                            <input type="text" name="occupation" class="form-control" placeholder="Enter Occupation"
                                value="{{ old('occupation') }}">
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
                                placeholder="Enter a Valid Email Address" value="{{ old('email') }}">
                            @error('email')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="country">NATIONALITY <span class="asterik">*</span></label>
                            <input type="text" name="country" class="form-control" placeholder="Enter Country"
                                value="{{ old('country') }}">
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
                                placeholder="Enter Social Networks" value="{{ old('social_account') }}">
                            @error('social_account')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="discord">DISCORD NAME + TAG (EG 'BEAST#1234') <span
                                    class="asterik">*</span></label>
                            <input type="text" name="discord" class="form-control" placeholder="Enter Discord Tag"
                                value="{{ old('discord') }}">
                            @error('discord')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="im_platform">INSTANT MESSAGING PLATFORM (EG 'Whatsapp, Telegram') <span
                                    class="asterik">*</span></label>
                            <input type="text" name="im_platform" class="form-control" placeholder="Enter Name of Instant Messaging Platform"
                                value="{{ old('im_platform') }}">
                            @error('im_platform')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="im_username">INSTANT MESSAGING PLATFORM USERNAME/PHONE  <span
                                    class="asterik">*</span></label>
                            <input type="text" name="im_username" class="form-control" placeholder="Enter Username or phone we can reach out to you with on the instant messaging Platform"
                                value="{{ old('im_username') }}">
                            @error('im_username')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label for="axie_played" class="mb-3">DO YOU HAVE EXPERIENCE PLAYING AXIE INFINITY
                                BEFORE?</label>
                            <div>
                                <div class="m-2">
                                    <input class="form-check-input" name="axie_played" type="radio" value="YES"> YES
                                </div>
                                <div class="m-2">
                                    <input class="form-check-input" name="axie_played" type="radio" value="NO"> NO
                                </div>
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
                                <div class="m-2">
                                    <input class="form-check-input" name="understand_game_rules" type="radio"
                                        value="YES">
                                    YES
                                </div>
                                <div class="m-2">
                                    <input class="form-check-input" name="understand_game_rules" type="radio"
                                        value="NO"> NO
                                </div>
                                <div class="m-2">
                                    <input class="form-check-input" name="understand_game_rules" type="radio"
                                        value="NO">
                                    NO, I would
                                    like to get trained on this
                                </div>
                            </div>
                            @error('understand_game_rules')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="member" class="mb-3">ARE YOU A MEMBER OF ANOTHER SCHOLARSHIP?</label>
                            <div>
                                <div class="m-2">
                                    <input class="form-check-input" name="member" type="radio" value="YES"> YES
                                </div>
                                <div class="m-2">
                                    <input class="form-check-input" name="member" type="radio" value="NO"> NO
                                </div>

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
                                placeholder="Do you have any Experience" value="{{ old('experience') }}">
                            @error('experience')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="playing_time">HOW MUCH TIME CAN YOU PLAY PER DAY? <span style="color:red">(1-11
                                    Hours)</span>
                            </label>
                            <input type="number" name="playing_time" class="form-control"
                                placeholder="How Much time can you play " value="{{ old('playing_time') }}">
                            @error('playing_time')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="comment">PLEASE PROVIDE ANY ADDITIONAL COMMENTS.
                            </label>
                            <textarea name="comment" class="form-control" cols="30" rows="5"
                                placeholder="Please provide any additional comments"> {{ old('comment') }}</textarea>
                            @error('comment')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-5">
                            <label for="refferal">HOW DID YOU HEAR ABOUT THIS? <span class="asterik">*</span>
                            </label>
                            <select class="form-control" name="refferal" id="select-form" onchange="
                                if( $(this).val() === 'Other' ){
                                    document.getElementById('other-input').classList.remove('d-none')
                                    // var option =  document.querySelector('#detail-input').value;
                                    // console.log(option);
                                    // document.getElementById('select-form').value = option;

                                }
                                if( $(this).val() === 'Friend' ){
                                    document.getElementById('other-input').classList.remove('d-none');
                                }
                                if( $(this).val() === 'CPG Employee' ){
                                    document.getElementById('other-input').classList.remove('d-none');
                                }
                                if( $(this).val() === 'Discord' ){
                                    document.getElementById('other-input').classList.add('d-none');
                                }
                                if( $(this).val() === 'Reddit' ){
                                    document.getElementById('other-input').classList.add('d-none');
                                }
                                if( $(this).val() === 'Twitter' ){
                                    document.getElementById('other-input').classList.add('d-none');
                                }
                                if( $(this).val() === 'NaijaFM' ){
                                    document.getElementById('other-input').classList.add('d-none');
                                }
                                if( $(this).val() === 'Google' ){
                                    document.getElementById('other-input').classList.add('d-none');
                                }
                            
                            ">
                                <option value="--Select---">--Select--</option>
                                <option value="Discord">Discord</option>
                                <option value="Reddit">Reddit</option>
                                <option value="Twitter">Twitter</option>
                                <option value="NaijaFM">NaijaFM</option>
                                <option value="Google">Google</option>
                                <option value="Friend">Friend</option>
                                <option value="CPG Employee">CPG Employee</option>
                                <option id="other-option" value="Other">Other</option>
                            </select>

                            {{-- <input type="text" name="refferal" class="form-control"
                                placeholder="How did you hear about this" value="{{ old('refferal') }}"> --}}
                            @error('refferal')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-5 d-none" id="other-input">
                            <label for="details">Enter Details
                            </label>
                            <input type="text" name="refferal_detail" id="detail-input" class="form-control" placeholder="">
                            @error('details')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-5">
                            <label for="spam">1 + 5 = ? <span class="asterik">*</span>
                            </label>
                            <input type="number" name="spam" class="form-control" placeholder="">
                            @error('spam')
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
        <p class="text-center">Developed by <a target="_blank" href="https://rooah.com">Rooah!</a> with ❤</p>
        <p class="text-center">© Rooah! LLC, 2021</p>
        <p class="text-center text-secondary"><a href="{{ route('login') }}">Admin</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
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
    {{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        toastr.error("{!! $error !!}")
    </script>
    @endforeach

    @endif --}}


</body>

</html>