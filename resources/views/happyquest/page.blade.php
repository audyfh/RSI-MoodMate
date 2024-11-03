@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center my-4">
    <h1><span class="highlight">Happy</span> Quest</h1>
</div>

<div class="container d-flex justify-content-center align-items-center">
   <div class="card shadow rounded-5 mb-5 w-100" style="background-color: #A594F9;">
        <div class="card-body">
            @foreach($quests as $index => $quest)
                <x-quest-item 
                    :quest="$quest" 
                    :number="$index + 1"
                    :description="$quest->description"
                    data-quest-id="{{ $quest->id }}"
                />
            @endforeach

        </div>
        <div class="d-flex justify-content-center"> 
            {{ $quests->links() }}
        </div>
   </div>
</div>



 {{-- Modal Component --}}
 <div class="modal fade" id="questModal" tabindex="-1" aria-labelledby="questModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="questModalLabel">Complete Quest</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="questDescription" style="color: black"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="completeQuestBtn">
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    Done
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentQuestButton = null;
        const modal = new bootstrap.Modal(document.getElementById('questModal'));

    document.getElementById('questModal').addEventListener('show.bs.modal', function(event) {
        currentQuestButton = event.relatedTarget;
        const questId = currentQuestButton.getAttribute('data-quest-id');
        const questDescription = currentQuestButton.getAttribute('data-quest-description') || 'Tidak ada';
        document.getElementById('questDescription').textContent = questDescription;
    });

        // Ketika tombol Done di modal diklik
        document.getElementById('completeQuestBtn').addEventListener('click', async function() {
    const button = this;
    const spinner = button.querySelector('.spinner-border');
    const questId = currentQuestButton.getAttribute('data-quest-id');

    // Tampilkan loading
    button.disabled = true;
    spinner.classList.remove('d-none');
    
    try {
        const response = await fetch(`/quests/${questId}/complete`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            credentials: 'same-origin'
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();

        if (data.success) {
            // Update tampilan button
            currentQuestButton.textContent = 'Done';
            currentQuestButton.classList.remove('btn-danger');
            currentQuestButton.classList.add('btn-success');
            currentQuestButton.disabled = true;

            // Tampilkan Toast notification
            const toast = new bootstrap.Toast(document.getElementById('successToast'));
            toast.show();
            
            // Tutup modal
            modal.hide();
        }
    } catch (error) {
        console.error('Error:', error);
        const toast = new bootstrap.Toast(document.getElementById('errorToast'));
        toast.show();
    } finally {
        // Sembunyikan loading
        button.disabled = false;
        spinner.classList.add('d-none');
    }
    });
});
</script>
@endpush

    {{-- Toast Notifications --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Quest completed successfully!
            </div>
        </div>

        <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                An error occurred while completing the quest.
            </div>
        </div>
    </div>

    
@endsection