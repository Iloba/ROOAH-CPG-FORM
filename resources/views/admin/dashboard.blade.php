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

    {{-- <!--Toastr--->
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet"> --}}

</head>

<body>
    <div class="header">
        <img class="mx-auto d-block logo" src="{{ asset('img/cp-icon.png') }}" alt="">
        <h1 class="text-center rooah-heading">CRYPTOPIGGY GUILD</h1>
        <p class="text-center axie-heading">Axie Infinity Scholarship Entries</p>
        <p class="text-center axie-heading">Admin Dashboard</p>

    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>S/NO</th>
                                    <th>FULL NAME</th>
                                    <th>AGE</th>
                                    <th>OCCUPATION</th>
                                    <th>GENDER</th>
                                    <th>EMAIL</th>
                                    <th>COUNTRY</th>
                                    <th>DISCORD</th>
                                    <th>SEE MORE</th>
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
                                <tr>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalLong-{{ $entry->id }}">
                                            See More
                                        </button>
                                    </td>
                                </tr>
                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong-{{ $entry->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">User Entry Details</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <b>English Level:</b> {{ $entry->english_level }} <br>
                                               <b>Playing Time:</b> {{ $entry->playing_time }} hours <br>
                                               <b>Social  Account:</b> {{ $entry->social_account }} <br>
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
                                                    <form action="{{ route('review.user', $entry->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Mark as Reviewed</button>
                                                    </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>