@foreach ($questions as $question)
    <div class="card mb-5">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            {{ $question->name }}
            <div class="align-items-right">
                <button type="button" class="btn btn-sm btn-warning" onclick="route('edit-question')">Edit</button>
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteWarningModal">Delete
                </button>
            </div>
        </h5>
        <div class="card-body">

            <div class="mb-3">
                <label for="questionCategory" class="form-label">Question Category</label>
                <select class="form-control" id="questionCategory" disabled>
                    <option id="1" selected>{{ $category_type->type }}</option>
                </select>
            </div>
            @php $options = \App\Models\Option::where('question_id' , $question->id)->get();@endphp

            @foreach ($options as $key => $option)
                <div class="mb-3">
                    <label for="option1" class="form-label">Option {{ $key + 1 }}</label>

                    <input type="text" class="form-control" id="option1" rows="3" value="{{ $option->name }}"
                        disabled>
                </div>
            @endforeach
        </div>

    </div>

    <div class="modal" tabindex="-1" id="deleteWarningModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this question.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="deleteQuestion(1)">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
