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
                    <h5 class="card-title">Eventt</h5>
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Day</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 0; 
                            @endphp
                            @if(!empty($dates))
                            
                                @foreach($dates as $key => $date)
                                <tr>
                                <td>{{$date}}</td>
                                <td>{{$event['recurrence_day']}}</td>
                                </tr>
                                @php
                                $count++; 
                                @endphp
                                @endforeach
                                <tr>
                                    <td><h5>Total Recurrence Event: {{$count}} </h5></td>
                                </tr>
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
