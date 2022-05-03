<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            Event Management
        </h2>
    </x-slot>

    @php 
        
           
            
    @endphp
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}" role="alert">
                {{Session::get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Event List</h5>

                    <a href="{{ route('addEvent') }}" class="btn btn-primary">
                    Add Event
                    </a>
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Dates</th>
                            <th scope="col">Occurrence</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($events))
                            @foreach($events as $key => $event)
                            <tr>
                            <th scope="row">{{$event['id']}}</th>
                            <td>{{$event['title']}}</td>
                            <td>{{$event['start_date']}} - {{$event['end_date']}}</td>
                            <td>{{$event['recurrence_time']." ".$event['recurrence_day']." of ".$event['recurrence_months']." Month(s)"}}</td>
                            <td><a href="{{ url('view',$event['id']) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ url('edit',$event['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ url('delete',$event['id']) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>No record found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
