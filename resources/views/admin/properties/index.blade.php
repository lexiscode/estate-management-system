@extends('admin.layouts.master')

@section('index-properties')
    <section class="section">

        <div class="section-header">
            <h1>Manage Properties</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage Your Properties Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                        </div>

                        <!-- This is the create new property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Create New Property</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Property Type</th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($properties->isEmpty())
                            <p>No properties found.</p>
                        @else

                            @foreach ($properties as $property)
                            <tr>
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->price }}</td>
                                <td>{{ $property->status }}</td>
                                <td>{{ $property->property_type }}</td>
                                <td>
                                    <div style="text-align: center;">

                                        <a href="{{ route('admin.property.show', $property->id) }}" class="btn btn-primary" id="exampleModal"><i class="fas fa-eye"></i></a>

                                        <a href="{{ route('admin.property.edit', $property->id) }}" class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form method="POST" action="{{ route('admin.property.destroy', $property->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type='submit' class="btn btn-danger btn-action"><i class="fas fa-trash"></i></button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>

    </section>
@endsection
