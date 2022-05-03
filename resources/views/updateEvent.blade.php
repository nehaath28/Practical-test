<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            Event Management
        </h2>
    </x-slot>
 
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissable margin5">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Errors:</strong> Please check below for errors
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div>
            @endif


            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}" role="alert">
                {{Session::get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Event</h5>
                    
                    <form method="post" action="{{ route('update_event') }}">
                    @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$event['title']}}" required>
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$event['id']}}" >
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" value="{{$event['start_date']}}" name="start_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" value="{{$event['end_date']}}" name="end_date" required>
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                            <span class="input-group-text">Recurrence</span>
                            <select class="form-select" name="recurrence_time" required>
                                <option value="1" {{$event['recurrence_time']=='1'? 'selected':''}}>First</option>
                                <option value="2" {{$event['recurrence_time']=='2'? 'selected':''}}>Second</option>
                                <option value="3" {{$event['recurrence_time']=='3'? 'selected':''}}>Third</option>
                                <option value="4" {{$event['recurrence_time']=='4'? 'selected':''}}>Fourth</option>
                            </select>
                            <select class="form-select" name="recurrence_day" required>
                                <option value="sun" {{$event['recurrence_day']=='sun'? 'selected':''}}>Sun</option>
                                <option value="mon" {{$event['recurrence_day']=='mon'? 'selected':''}}>Mon</option>
                                <option value="tue" {{$event['recurrence_day']=='tue'? 'selected':''}}>Tue</option>
                                <option value="wed" {{$event['recurrence_day']=='wed'? 'selected':''}}>Wed</option>
                                <option value="thu" {{$event['recurrence_day']=='thu'? 'selected':''}}>Thu</option>
                                <option value="fri" {{$event['recurrence_day']=='fri'? 'selected':''}}>Fri</option>
                                <option value="sat" {{$event['recurrence_day']=='sat'? 'selected':''}}>Sat</option>
                            </select>
                            <select class="form-select" name="recurrence_months" required>
                                <option value="1" {{$event['recurrence_months']=='1'? 'selected':''}}>Month</option>
                                <option value="3" {{$event['recurrence_months']=='3'? 'selected':''}}>3 Months</option>
                                <option value="4" {{$event['recurrence_months']=='4'? 'selected':''}}>4 Months</option>
                                <option value="6" {{$event['recurrence_months']=='6'? 'selected':''}}>6 Months</option>
                                <option value="year" {{$event['recurrence_months']=='year'? 'selected':''}}>Year</option>
                            </select>
                            </div>
                        </div>
                        
                            <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
