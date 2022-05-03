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
                    <h5 class="card-title">Add Event</h5>
                    
                    <form method="post" action="{{ route('store_event') }}">
                    @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                            <span class="input-group-text">Recurrence</span>
                            <select class="form-select" name="recurrence_time" required>
                                <option value="First" selected>First</option>
                                <option value="Second">Second</option>
                                <option value="Third">Third</option>
                                <option value="Fourth">Fourth</option>
                            </select>
                            <select class="form-select" name="recurrence_day" required>
                                <option value="sunday" selected>Sun</option>
                                <option value="monday">Mon</option>
                                <option value="tuesday">Tue</option>
                                <option value="wednesday">Wed</option>
                                <option value="thursday">Thu</option>
                                <option value="friday">Fri</option>
                                <option value="saturday">Sat</option>
                            </select>
                            <select class="form-select" name="recurrence_months" required>
                                <option value="1" selected>Month</option>
                                <option value="3">3 Months</option>
                                <option value="4">4 Months</option>
                                <option value="6">6 Months</option>
                                <option value="year">Year</option>
                            </select>
                            </div>
                        </div>
                        
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
