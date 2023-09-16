@extends('admin.layouts.master')

@section('search-agents')
    <section class="section">

        <div class="section-header">
            <h1>All Agents</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Checkout Agents Details Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the add new agent button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.agent.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($agent_search->isEmpty())
                            <p>No such Agent found.</p>
                        @else
                            @foreach ($agent_search as $agent)
                                <tr>
                                    <td>{{ $agent->name }}</td>
                                    <td>{{ $agent->email }}</td>
                                    <td>{{ $agent->phone_no }}</td>
                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('admin.agent.show', $agent->id) }}"
                                                class="btn btn-primary" id="exampleModal"><i class="fas fa-eye"></i></a>

                                            <a href="{{ route('admin.agent.edit', $agent->id) }}"
                                                class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <form method="POST"
                                                action="{{ route('admin.agent.destroy', $agent->id) }}"
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
