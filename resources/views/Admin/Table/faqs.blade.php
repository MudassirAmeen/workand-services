@extends('Admin.Dashboard')

@section('title', 'FAQs Table')
@section('tableExpend', 'true')
@section('tableShow', 'show')

@section('mainContent')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="row">
                <div class="col-8">
                    <h2 class="h4 mb-1">Your FAQs</h2>
                    <p class="mb-1">Here You can View, Edit, Delete or Add New FAQs</p>
                    <p class="mb-3">You have Total {{ $totalfaqs }} FAQs.</p>
                </div>

                <div class="col-4">
                    <a href="{{ route('faqs.create') }}"><button class="btn btn-primary float-right">Add New</button></a>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Question</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>
                                        <p class="mb-0 text-muted">
                                            <strong>{{ $faq->id }}</strong>
                                        </p>
                                    </td>
                                    <td>
                                        <a href="{{ route('terms.show', ['term' => $faq->id]) }}">
                                            <p class="mb-0 text-muted"><strong>{{ $faq->question }}</strong></p>
                                        </a>
                                    </td>
                                    <td class="text-muted">{{ $faq->created_at->format('Y-m-d') }}</td>

                                    <td>
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="{{ route('faqs.edit', ['faq' => $faq->id]) }}">Edit</a>
                                            <form action="{{ route('faqs.destroy', ['faq' => $faq->id]) }}"
                                                class="dropdown-item" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-transparent"
                                                    style="display:contents"><a>DELETE</a></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $faqs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div> <!-- customized table -->
    </div>
@endsection
