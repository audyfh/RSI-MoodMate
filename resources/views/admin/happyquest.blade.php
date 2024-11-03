@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>

        </div>
        <div class="ps-5">
            <h1><span class="highlight">Happy</span> Quest Admin</h1>
        </div>
        <div class="">
            <button class="btn btn-primary rounded-pill" 
                    style="padding: 1px 8px;background-color: #A594F9; color: black;"
                    data-bs-toggle="modal" 
                    data-bs-target="#addQuestModal">
                Add Quest
            </button>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="card shadow rounded-5 mb-5 w-100" style="background-color: #A594F9;">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @foreach($quests as $index => $quest)
                    <div class="row rounded-5 mx-4 my-3" style="background-color: #524A7C">
                        <div class="col-1 pt-3">
                            <span style="color:white">{{ $index + 1 }}</span>
                        </div>
                        <div class="col-8 pt-3">
                            <p style="color:white">{{ $quest->title }}</p>
                        </div>
                        <div class="col pt-2 d-flex justify-content-end align-items-center">
                            <button 
                                class="btn btn-warning me-2  h-50 rounded-5 edit-button"
                                style="padding: 1px 15px"
                                data-quest-id="{{ $quest->id }}"
                                data-bs-toggle="modal" 
                                data-bs-target="#editQuestModal"
                                data-quest-title="{{ $quest->title }}"
                                data-quest-description="{{ $quest->description }}">
                                Edit
                            </button>
                            <form action="{{ route('admin.quests.destroy', $quest->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding: 1px 15px" class="btn btn-danger h-50 rounded-5" onclick="return confirm('Are you sure you want to delete this quest?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center"> 
                {{ $quests->links() }}
            </div>
        </div>
    </div>

    <!-- Add Quest Modal -->
    <div class="modal fade" id="addQuestModal" tabindex="-1" aria-labelledby="addQuestModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestModalLabel">Add New Quest</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.quests.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="questTitle" class="form-label">Quest Title</label>
                            <input type="text" class="form-control" id="questTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="questDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="questDescription" name="description" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Quest</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Quest Modal -->
    <div class="modal fade" id="editQuestModal" tabindex="-1" aria-labelledby="editQuestModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editQuestModalLabel">Edit Quest</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editQuestForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editQuestTitle" class="form-label">Quest Title</label>
                            <input type="text" class="form-control" id="editQuestTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="editQuestDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editQuestDescription" name="description" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const editQuestModal = document.getElementById('editQuestModal');
    const editQuestForm = document.getElementById('editQuestForm');
    const editQuestTitle = document.getElementById('editQuestTitle');
    const editQuestDescription = document.getElementById('editQuestDescription');

    editQuestModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const questId = button.getAttribute('data-quest-id');
        const questTitle = button.getAttribute('data-quest-title');
        const questDescription = button.getAttribute('data-quest-description');

        editQuestTitle.value = questTitle;
        editQuestDescription.value = questDescription;
        editQuestForm.action = "{{ route('admin.quests.update', '') }}" + "/" + questId;
    });
});
</script>
@endpush