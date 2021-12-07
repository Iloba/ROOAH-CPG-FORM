@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="header">
            <img width="100" class="mx-auto d-block logo" src="{{ asset('img/cp-icon.png') }}" alt="">
            <h1 class="text-center rooah-heading">CRYPTOPIGGY GUILD</h1>
            <p class="text-center axie-heading">Axie Infinity Scholarship Entries</p>
            <p class="text-center">Entries with green background have been reviwed, while those with white have not</p>

        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} {{ __('You are logged in!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if ($entries->count() > 0)
                    <div class="table-responsive mb-3">
                        <div class="float-right">
                            {{-- <form action="">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                      <button class="btn btn-outline-secondary" type="button">Button</button>
                                    </div>
                                  </div>

                            </form> --}}
                        </div>
                        <table class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>@sortablelink('ID')</th>
                                    <th> @sortablelink('Full_Name')</th>
                                    <th> @sortablelink('Age')</th>
                                    <th>OCCUPATION</th>
                                    <th>SEX</th>
                                    <th>EMAIL</th>
                                    <th>COUNTRY</th>
                                    <th>@sortablelink('Created_At')</th>
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
                                        {{\Carbon\Carbon::parse($entry->created_at)->format('M d Y') }}
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
                                                <b>Discord:</b> {{ $entry->discord }} <br>
                                                <b>English Level:</b> {{ $entry->english_level }} <br>
                                                <b>Playing Time:</b> {{ $entry->playing_time }} hours <br>
                                                <b>Social Account:</b> {{ $entry->social_account }} <br>
                                                <b> Experience:</b> {{ $entry->experience }} <br>
                                                <b>Refferal:</b> {{ $entry->refferal }} <br>
                                                <b>Played Game before:</b> {{ $entry->axie_played }} <br>
                                                <b>Understand Game Rules:</b> {{ $entry->understand_game_rules }} <br>
                                                <b>Member of another Scholarship:</b> {{ $entry->member }} <br>
                                                <b>Comment:</b> {{ $entry->comment }} <br>
                                                <b>Interviewed:</b> {{ $entry->interviewed }} <br>
                                                <b>Discord:</b> {{ $entry->discord }}
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                @if ($entry->reviewed)
                                                <a class="btn btn-danger"
                                                    href="{{ route('reverse.review.user', $entry->id) }}">
                                                    Reverse
                                                    Changes
                                                </a>
                                                {{-- <form action="{{ route('reverse.review.user', $entry->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Reverse
                                                        Changes
                                                    </button>
                                                </form> --}}
                                                @else
                                                <a class="btn btn-primary"
                                                    href="{{ route('review.user', $entry->id) }}">Reviewed</a>
                                                {{-- <form action="{{ route('review.user', $entry->id) }}"
                                                    method="POST">
                                                    @csrf

                                                    <button type="submit" class="btn btn-primary">
                                                        Mark as
                                                        Reviewed
                                                    </button>
                                                </form> --}}
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>



                    </div>
                    <div class=" p-3  d-flex justify-content-center">
                        {{-- {{ $entries->links() }} --}}
                        {{-- {{ $entries->appends(\Request::except('page'))->render() }} --}}
                    </div>
                    @else
                    <p class="text-center">There are no entries yet</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection