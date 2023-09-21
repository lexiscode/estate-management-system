@extends('admin.layouts.master')

@section('search-properties')
    <section class="section">

        <div class="section-header">
            <h1>Manage Properties</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage Your Properties Here!</h4>
                <form class="card-header-form" action="{{ route('admin.property.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search">
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

                <!-- Display new property creation success message if it exists -->
                @if (session('creation-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('creation-success') }}
                        </div>
                    </div>
                @endif
                <!-- Display updated property success message if it exists -->
                @if (session('update-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('update-success') }}
                        </div>
                    </div>
                @endif

                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Price (₦)</th>
                            <th scope="col">Status</th>
                            <th scope="col">Property Type</th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($properties->isEmpty())
                            <p>No properties found.</p>
                        @else
                            @foreach ($properties as $property)
                                <tr>
                                    <td>{{ $property->title }}</td>
                                    <td>{{ number_format($property->price, 2) }}</td>
                                    <td>
                                        @if ($property->status === 'New')
                                            <div class="badge badge-success">{{ $property->status }}</div>
                                        @elseif ($property->status === 'Rent')
                                            <div class="badge badge-info">{{ $property->status }}</div>
                                        @elseif ($property->status === 'Sold')
                                            <div class="badge badge-danger">{{ $property->status }}</div>
                                        @endif

                                    </td>
                                    <td>{{ $property->property_type }}</td>
                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('admin.property.show', $property->id) }}"
                                                class="btn btn-primary" id="exampleModal"><i class="fas fa-eye"></i></a>

                                            <a href="{{ route('admin.property.edit', $property->id) }}"
                                                class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                                <i class="far fa-edit"></i></i>
                                            </a>
                                            
                                            <a href="{{ route('admin.property.destroy', $property->id) }}" class="btn btn-danger delete-item">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $properties->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>

@endsection

