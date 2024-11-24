@extends('layouts.app')

@section('content')
    <div class="container my-4">

        <div class="d-flex justify-content-center my-4">
            <h1><span class="highlight">Emotion</span> Track</h1>
        </div>
        <div class="d-flex justify-content-between align-items-center container">
            <div>
                <p>Table</p>
            </div>
            <div>
                <button class="btn btn-primary rounded-pill"  style="padding: 1px 8px;background-color: #A594F9; color: black;" data-bs-toggle="modal" data-bs-target="#inputModal">
                    Add Track
                </button>
            </div>
        </div>

        <!-- Tabel Emotion Track -->
        <table class="table">
            <thead>
                <tr>
                    <th>Emotion</th>
                    <th>Title</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emotionTracks as $track)
                    <tr>
                        <td>{{ $track->emotion === 'happy' ? '😊' : ($track->emotion === 'neutral' ? '😐' : '😢') }}</td>
                        <td>
                             
                            <a href="#" data-bs-toggle="modal" data-bs-target="#detailModal"
                            data-id="{{ $track->id }}"
                            data-title="{{ $track->title }}"
                            data-content="{{ $track->content }}"
                            data-emotion="{{ $track->emotion }}"
                            style="color: inherit; text-decoration: none;">
                             {{ $track->title }}
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('emotion_track.destroy', $track->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Input -->
    <div class="modal fade" id="inputModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Emotion Track</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="trackForm">
                        @csrf
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label>Content</label>
                            <textarea name="content" class="form-control" id="content" rows="3" required></textarea>
                        </div>
                        <button type="button" class="btn btn-primary w-100" onclick="showEmoticonModal()">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Emoticon -->
    <div class="modal fade" id="emoticonModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Select Your Emotion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <button type="button" class="btn btn-outline-primary mx-2" onclick="submitEmotion('happy')">😊</button>
                    <button type="button" class="btn btn-outline-secondary mx-2" onclick="submitEmotion('neutral')">😐</button>
                    <button type="button" class="btn btn-outline-danger mx-2" onclick="submitEmotion('sad')">😢</button>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal untuk Detail/Update Emotion Track -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Update Emotion Track</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="modalTitleInput" class="form-label">Title</label>
                            <input type="text" id="modalTitleInput" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="modalContentInput" class="form-label">Content</label>
                            <textarea id="modalContentInput" name="content" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Emotion</label>
                            <div>
                                <button type="button" class="btn btn-outline-primary mx-2" onclick="setEmotion('happy')">😊</button>
                                <button type="button" class="btn btn-outline-secondary mx-2" onclick="setEmotion('neutral')">😐</button>
                                <button type="button" class="btn btn-outline-danger mx-2" onclick="setEmotion('sad')">😢</button>
                            </div>
                            <input type="hidden" id="modalEmotionInput" name="emotion">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        function showEmoticonModal() {
            const title = document.getElementById("title").value;
            const content = document.getElementById("content").value;

            if (title && content) {
                var inputModal = new bootstrap.Modal(document.getElementById('inputModal'));
                inputModal.hide();

                var emoticonModal = new bootstrap.Modal(document.getElementById('emoticonModal'));
                emoticonModal.show();
            }
        }

        function submitEmotion(emotion) {
            const title = document.getElementById("title").value;
            const content = document.getElementById("content").value;

            fetch('{{ route('emotion_track.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ title: title, content: content, emotion: emotion })
            }).then(response => {
                if (response.ok) {
                    location.reload();
                }
            });

            var emoticonModal = bootstrap.Modal.getInstance(document.getElementById('emoticonModal'));
            emoticonModal.hide();
        }

        // Event listener untuk menangkap data saat modal ditampilkan
    var detailModal = document.getElementById('detailModal');
    detailModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Tombol yang diklik untuk membuka modal
        var title = button.getAttribute('data-title'); // Ambil data-title
        var content = button.getAttribute('data-content'); // Ambil data-content
        var id = button.getAttribute('data-id'); // Ambil data-id
        var emotion = button.getAttribute('data-emotion'); // Ambil data-emotion

        // Isi form dengan data yang diambil
        document.getElementById('modalTitleInput').value = title;
        document.getElementById('modalContentInput').value = content;
        document.getElementById('modalEmotionInput').value = emotion;

        // Set action pada form update
        var form = document.getElementById('updateForm');
        form.action = '/emotion_track/' + id; // Sesuaikan dengan ID track
    });


    function setEmotion(emotion) {
        document.getElementById('modalEmotionInput').value = emotion;
    }


        // Event listener untuk menangkap data saat modal ditampilkan
    var detailModal = document.getElementById('detailModal');
    detailModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Tombol yang diklik untuk membuka modal
        var title = button.getAttribute('data-title'); // Ambil title dari attribute
        var content = button.getAttribute('data-content'); // Ambil content dari attribute

        // Isi modal dengan data
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalContent').textContent = content;
    });
    </script>
@endsection
