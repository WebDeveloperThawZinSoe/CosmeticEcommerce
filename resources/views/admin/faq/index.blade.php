@extends('layouts.admin')
@section('body')

<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> Please check the form below for errors.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <button class="btn btn-primary btn-tone m-r-5" data-toggle="modal" data-target="#createModal">
            <i class="anticon anticon-plus"></i> Create
        </button>

        <div class="m-t-25">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $key => $faq)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $faq->id }}">
                                <i class="anticon anticon-edit"></i>
                            </button>
                            <form style="display:inline-block" action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure to delete this FAQ?')" class="btn btn-danger">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $faq->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit FAQ</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <i class="anticon anticon-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="question">Question</label>
                                            <input type="text" class="form-control" name="question" value="{{ $faq->question }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="answer">Answer</label>
                                            <textarea class="form-control" name="answer" rows="5" required>{{ $faq->answer }}</textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create FAQ</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.faq.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" class="form-control" name="question" value="{{ old('question') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <textarea class="form-control" name="answer" rows="5" required>{{ old('answer') }}</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
