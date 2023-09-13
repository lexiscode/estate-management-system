@extends('admin.layouts.master')

@section('search-remittances')
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

                        <!-- This is the create new blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Add New Property</a>
                        </div>

                    </div>

                </form>
            </div>
            <div class="card-body">

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
                        @if ($property_search->isEmpty())
                            <div class="card-body">
                                <div class="empty-state" data-height="400" style="height: 400px;">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-question"></i>
                                    </div>
                                    <h2>Oops! We couldn't find any data</h2>
                                    <p class="lead">
                                        Note: Ensure that there are no unnecessary space in-between the data name you are searching
                                        for, if still yes, then sorry your search request isn't in available in your database.
                                    </p>
                                    <a href="{{ route('admin.property.index') }}" class="btn btn-primary mt-4">Go Back</a>
                                </div>
                            </div>
                        @else
                        @foreach ($property_search as $property)
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
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form method="POST"
                                            action="{{ route('admin.property.destroy', $property->id) }}"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type='submit' class="btn btn-danger btn-action"><i
                                                    class="fas fa-trash"></i></button>

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
