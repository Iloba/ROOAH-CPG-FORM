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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200&display=swap"
        rel="stylesheet">

    <!--Styles--->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
</head>

<body>
    <div class="header">
        <img class="mx-auto d-block logo" src="{{ asset('img/cp-icon.png') }}" alt="">
        <h1 class="text-center rooah-heading">CRYPTOPIGGY GUILD</h1>
        <p class="text-center axie-heading">Axie Infinity Scholarship Entries</p>
        <p class="text-center axie-heading">Admin Dashboard</p>
        <p class="text-center">Entries with green background have been reviwed, while those with white have not</p>

    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="table-responsive mb-3">
                        <table class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th> NAME</th>
                                    <th>AGE</th>
                                    <th>OCCUPATION</th>
                                    <th>SEX</th>
                                    <th>EMAIL</th>
                                    <th>COUNTRY</th>
                                    <th>DISCORD</th>
                                    <th>REVIEWED</th>
                                    <th>MORE</th>
                                    {{-- <th>FULL NAME</th>
                                    <th>FULL NAME</th>
                                    <th>FULL NAME</th>
                                    <th>FULL NAME</th>
                                    <th>FULL NAME</th>
                                    <th>FULL NAME</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entries as $entry)
                                <tr class="{{ $entry->reviewed ? 'bg-success text-light' : ''}}">
                                    <td>
                                        {{ $entry->id }}
                                    </td>
                                    <td>
                                        {{ $entry->full_name }}
                                    </td>
                                    <td>
                                        {{ $entry->age }}
                                    </td>
                                    <td>
                                        {{ $entry->occupation }}
                                    </td>
                                    <td>
                                        {{ $entry->gender }}
                                    </td>
                                    <td>
                                        {{ $entry->email }}
                                    </td>
                                    <td>
                                        {{ $entry->country }}
                                    </td>
                                    <td>
                                        {{ $entry->discord }}
                                    </td>
                                    <td>
                                        @if ($entry->reviewed)
                                         <i class="fas fa-check-circle bg-light p-3 text-success"></i>
                                        @else
                                            <i class="fas fa-window-close bg-primary p-3 text-light"></i>
                                        @endif
                                
                                    </td>   
                                    <td>
                                        <button type="button"
                                            class="{{ $entry->reviewed ? 'btn btn-light' : 'btn btn-primary' }}"
                                            data-toggle="modal" data-target="#exampleModalLong-{{ $entry->id }}">
                                            <i class="fas fa-caret-square-down"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong-{{ $entry->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">User Entry Details
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <b>English Level:</b> {{ $entry->english_level }} <br>
                                                <b>Playing Time:</b> {{ $entry->playing_time }} hours <br>
                                                <b>Social Account:</b> {{ $entry->social_account }} <br>
                                                <b> Experience:</b> {{ $entry->experience }} <br>
                                                <b>Refferal:</b> {{ $entry->refferal }} <br>
                                                <b>Played Game before:</b> {{ $entry->axie_played }} <br>
                                                <b>Understand Game Rules:</b> {{ $entry->understand_game_rules }} <br>
                                                <b>Member of another Scholarship:</b> {{ $entry->member }} <br>
                                                <b>Comment:</b> {{ $entry->comment }} <br>
                                                <b>Interviewed:</b> {{ $entry->interviewed }}
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                @if ($entry->reviewed)
                                                <form action="{{ route('reverse.review.user', $entry->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Reverse
                                                        Changes</button>
                                                </form>
                                                @else
                                                <form action="{{ route('review.user', $entry->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Mark as
                                                        Reviewed</button>
                                                </form>
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                       
                      
                      
                    </div>
                    <div class="mx-auto d-block">
                        {{ $entries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer">
        <p class="text-center">Developed by <a href="https://rooah.com">Rooah!</a> with ❤</p>
        <p class="text-center">© Rooah! LLC, 2021</p>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
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




</body>

</html>