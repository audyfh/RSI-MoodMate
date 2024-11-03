<div class="row rounded-5 mx-4 my-3" 
     style="background-color: #524A7C" >
    <div class="col-1 pt-3">
        <span style="color:white">{{ $number }}</span>
    </div>
    <div class="col-9 pt-3">
        <p style="color:white">{{ $quest->title }}</p>
    </div>
    <div class="col pt-2 ms-4">
        <button 
            class="btn {{ $quest->isCompletedByUser(auth()->user()) ? 'btn-success' : 'btn-danger' }} rounded-5 quest-button" 
            data-quest-id="{{ $quest->id }}"
            data-bs-toggle="modal" 
            data-bs-target="#questModal"
            data-quest-description="{{ $quest->description }}"
            id="questButton-{{ $quest->id }}"
            {{ $quest->isCompletedByUser(auth()->user()) ? 'disabled' : '' }}>
            {{ $quest->isCompletedByUser(auth()->user()) ? 'Done' : 'Not Started' }}
        </button>
    </div>
</div>