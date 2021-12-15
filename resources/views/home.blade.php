@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="header mb-3">
            <img width="100" class="mx-auto d-block logo" src="{{ asset('img/cp-icon.png') }}" alt="rooah">
            <h1 class="text-center rooah-heading">CRYPTOPIGGY GUILD</h1>
            <p class="text-center axie-heading text-bold">Axie Infinity Scholarship Entries <br> Entries with green
                background have been reviwed, while those with white have not </p>

        </div>
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <div class="card shadow-sm p-3">
                        <p class="text-center">All <br>Applicants: <br> <b class="text-primary "
                                style="font-size: 1.6rem;">{{ $entriesCount }}</b> </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card shadow-sm p-3">
                        <p class="text-center">Reviewed Applicants: <br> <b class="text-primary"
                                style="font-size: 1.6rem;">{{ $reviewedEntriesCount }}</b> </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card shadow-sm p-3">
                        <p class="text-center">Hired <br> Applicants: <br> <b class="text-primary"
                                style="font-size: 1.6rem;">{{ $HiredEntriesCount }}</b> </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card shadow-sm p-3">
                        <p class="text-center"> Interviewed Applicants: <br> <b class="text-primary"
                                style="font-size: 1.6rem;">{{ $interviewedEntriesCount }}</b> </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card shadow-sm p-3">
                        <p class="text-center"> Terminated Applicants: <br> <b class="text-primary"
                                style="font-size: 1.6rem;">{{ $terminatedEntriesCount }}</b> </p>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header"> Dashboard</div>
                <div class="card-body p-3">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if ($entries->count() > 0)
                    <div class="table-responsive mb-3 p-2">

                        <div class="container-fluid">
                            <div class="row mb-3 ">
                                <div class="col-md-4 mb-3">
                                    <form action="{{ route('home') }}" class="mb-2" method="POST">
                                        @csrf
                                        @method('GET')
                                        <div class="form-group">
                                            <label for="country">Filter By Country</label> <br>
                                            <select name="country" class="filter-input">

                                                @foreach ($countries->unique('country') as $country)
                                                <option value="{{ $country->country }}">{{ $country->country }}</option>
                                                @endforeach

                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-filter"></i></button>
                                        </div>
                                    </form>


                                    <form action="{{ route('home') }}" class="mb-2" method="POST">
                                        @csrf
                                        @method('GET')
                                        <div class="form-group ">
                                            <label for="age">Filter By Age</label> <br>
                                            <select name="age" class="filter-input">

                                                @foreach ($ages->unique('age') as $age)
                                                <option value="{{ $age->age }}">{{ $age->age }} years old</option>
                                                @endforeach

                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-filter"></i></button>
                                        </div>
                                    </form>
                                    <form action="{{ route('home') }}" class="mb-2" method="POST">
                                        @csrf
                                        @method('GET')
                                        <div class="form-group">
                                            <label for="age">Filter By English Level</label> <br>
                                            <select name="english_level" class="filter-input">

                                                @foreach ($englishLevels->unique('english_level') as $englishLevel)
                                                <option value="{{ $englishLevel->english_level }}">{{
                                                    $englishLevel->english_level }}</option>
                                                @endforeach

                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-filter"></i></button>
                                        </div>
                                    </form>
                                    <form action="{{ route('home') }}" class="mb-2" method="POST">
                                        @csrf
                                        @method('GET')
                                        <div class="form-group">
                                            <label for="age">Filter By Playing Time</label> <br>
                                            <select name="playing_time" class="filter-input">

                                                @foreach ($playingTimes->unique('playing_time') as $playingTime)
                                                <option value="{{ $playingTime->playing_time }}">{{
                                                    $playingTime->playing_time }} Hours</option>
                                                @endforeach

                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-filter"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-4">
                                    &nbsp;
                                </div>

                                <div class="col-md-4 mb-3">
                                    <form action="{{ route('home') }}" class="mb-3" method="POST">
                                        @csrf
                                        @method('GET')
                                        <div class="form-group">
                                            <label for="country">Filter By Experience</label> <br>
                                            <select name="experience" class="filter-input">

                                                @foreach ($experiences->unique('axie_played') as $experience)
                                                <option value="{{ $experience->axie_played }}">{{
                                                    $experience->axie_played }}</option>
                                                @endforeach

                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-filter"></i></button>
                                        </div>
                                    </form>

                                    <form action="{{ route('home') }}" class="mb-3" method="POST">
                                        @csrf
                                        @method('GET')
                                        <div class="form-group ">
                                            <label for="age">Filter By Status</label> <br>
                                            <select name="status" class="filter-input">

                                                @foreach ($statuses->unique('status') as $status)
                                                <option value="{{ $status->status }}">{{ $status->status }}</option>
                                                @endforeach

                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-filter"></i></button>
                                        </div>
                                    </form>

                                    <form action="{{ route('home') }}" class="mb-3" method="POST">
                                        @csrf
                                        @method('GET')
                                        <div class="form-group">
                                            <label for="age">Filter By Date Registered</label> <br>
                                            <select name="created_at" class="filter-input">

                                                @foreach ($dateRegistereds->unique('created_at') as $dateRegistered)
                                                <option value="{{ $dateRegistered->created_at }}">
                                                    {{
                                                    \Carbon\Carbon::parse($dateRegistered->created_at)->format('M d Y')
                                                    }}</option>
                                                @endforeach

                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-filter"></i></button>
                                        </div>
                                    </form>

                                    <form action="{{route('home')}}" method="POST">
                                        @csrf
                                        @method('GET')
                                        <div class="input-group mb-2">

                                            <input type="text" name="search" id="inlineFormInputGroup"
                                                placeholder="Search">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="input-group-text btn btn-primary"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th>@sortablelink('ID')</th>
                                    <th> @sortablelink('Full_Name')</th>
                                    <th> @sortablelink('Age')</th>
                                    <th>@sortablelink('gender')</th>
                                    <th>Email</th>
                                    <th>Nationality</th>
                                    <th>@sortablelink('Created_At')</th>
                                    <th>@sortablelink('status')</th>
                                    <th>Reviewed</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entries as $entry)
                                <tr class="{{ $entry->reviewed ? ' table-success' : ''}}">
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
                                        {{ $entry->status }}
                                    </td>
                                    <td>
                                        @if ($entry->reviewed)
                                        <i class="fas fa-check-circle bg-light p-2 text-success"></i>
                                        @else
                                        <i class="fas fa-window-close bg-primary p-2 text-light"></i>
                                        @endif

                                    </td>
                                    <td>
                                        <button type="button"
                                            class="{{ $entry->reviewed ? 'btn btn-light btn-sm' : 'btn btn-primary btn-sm' }}"
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
                                                <h5 class="modal-title" id="exampleModalLongTitle">User Entry
                                                    Details
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <b>Telephone:</b> {{ $entry->phone }} <br>
                                                <b>Instant Messaging Platform:</b> {{
                                                $entry->instant_messaging_platform }} <br>
                                                <b>Instant Messaging Platform Username/Phone:</b> {{
                                                $entry->instant_messaging_platform_username }} <br>
                                                <b>Occupation:</b> {{ $entry->occupation }} <br>
                                                <b>Discord:</b> {{ $entry->discord }} <br>
                                                <b>English Level:</b> {{ $entry->english_level }} <br>
                                                <b>Playing Time:</b> {{ $entry->playing_time }} hours <br>
                                                <b>Social Account:</b> {{ $entry->social_account }} <br>
                                                <b> Experience:</b> {{ $entry->experience }} <br>
                                                <b>Refferal:</b> {{ $entry->refferal }} <b>Refferal Detail: {{
                                                    $entry->refferal_detail }}</b> <br>
                                                <b>Played Game before:</b> {{ $entry->axie_played }} <br>
                                                <b>Understand Game Rules:</b> {{ $entry->understand_game_rules }}
                                                <br>
                                                <b>Member of another Scholarship:</b> {{ $entry->member }} <br>
                                                <b>Comment:</b> {{ $entry->comment }} <br>
                                            </div>
                                           
                                            <h4 class="text-center">Change Scholar Status</h4> <br>
                                            {{-- <div class="modal-footer mx-auto">
                                                <a href="" class="btn btn-info btn-sm">Set to default status
                                                </a>
                                            </div> --}}
                                            <div class="modal-footer">
                                                

                                                @if ($entry->reviewed)
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('reverse.review.user', $entry->id) }}">
                                                    Set to Unreviewed
                                                </a>

                                                @else
                                                <a class="btn btn-success btn-sm"
                                                    href="{{ route('review.user', $entry->id) }}">Reviewed</a>
                                                @endif

                                               @if ($entry->status === 'Interviewed')
                                               <a href="{{ route('reverse.interviewed.user', $entry->id) }}"
                                                class="btn btn-secondary btn-sm">Not Interviewed</a>
                                            
                                               @endif

                                               @if ($entry->status === 'Not Qualified')
                                                <a href="{{ route('status.interviewed', $entry->id) }}"
                                                    class="btn btn-secondary btn-sm">Interviewed</a>
                                               @endif

                                               @if ($entry->status === 'Not Interviewed')
                                                <a href="{{ route('status.interviewed', $entry->id) }}"
                                                    class="btn btn-secondary btn-sm">Interviewed</a>
                                               @endif



                                                <a href="{{ route('status.hired', $entry->id) }}"
                                                    class="btn btn-primary btn-sm">Hired</a>




                                               @if ($entry->status === 'Contract Terminated')
                                               
                                                <a href="{{ route('status.not.terminated', $entry->id) }}"
                                                    class="btn btn-danger btn-sm">Not Terminated</a>

                                                @else

                                                <a href="{{ route('status.terminated', $entry->id) }}"
                                                    class="btn btn-danger btn-sm">Terminated</a>
    
                                               @endif


                                                <a href="{{ route('status.not.qualified', $entry->id) }}" class="btn btn-secondary btn-sm">Not Qualified
                                                </a>


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
                        {{ $entries->appends(\Request::except('page'))->render() }}
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