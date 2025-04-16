@extends('layouts.app_schoolareas')
@section ('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 

{!! Form::open(['action' => ['App\Http\Controllers\School\SchoolAreasController@update', $school_area->id], 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}

    <div class="row">
        <div class="d-flex align-items-center justify-content-between bd-highlight" >
            <div class="bd-highlight">
                <h4>Uredi področje šole</h4>
            </div>
            <div class="bd-highlight">
                <a href="{{ url()->previous() }}" title="Nazaj">
                    <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
                    | 
                    <a href="/schools/areas" title="Področja"><i class="fa fa-book fa-lg icon-menu"> </i></a>
                    <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
                </a>
            </div>
        </div>
        <hr>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_area_name','Ime področja')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::text('school_area_name',$school_area->school_area_name,['class' =>'form-control', 'placeholder'=>'Ime'])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                {{ Form::label('school_area_description', 'Opis') }}
                            </div>
                            <div class="col-md-9">
                                {{Form::textarea('school_area_description', $school_area->school_area_description, ['id' => 'description-ckeditor', 'class' => 'form-control', 'placeholder' => 'Opis področja','rows' => 5])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                {{ Form::label('school_area_description_short', 'Kratek opis') }}
                            </div>
                            <div class="col-md-9">
                                {{Form::textarea('school_area_description_short', $school_area->school_area_description_short, ['id' => 'description_short-ckeditor', 'class' => 'form-control', 'placeholder' => 'Kratek opis področja','rows' => 5])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    {{ Form::label('quality_question_tags', 'Delovna mesta') }}
                </div>
                <div class="col-md-5">
                    <ul id="selected-positions" class="list-group mt-2"></ul>
                </div>
                <div class="col-md-3">
                    <input type="text" id="position-input" class="form-control" placeholder="Dodajte delovno mesto">
                    <ul id="position-list" class="list-group mt-2"></ul>
                    <input type="hidden" name="school_position" id="positions" value="">
                </div>
            </div>
        </div>
                </div>
            </div>
            
            <br>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Shrani', ['class' =>'btn btn-primary' ])}}
            {!! Form::close() !!}
            
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        let availableTags = {!! json_encode($school_positions) !!};
        let selectedTags = {!! json_encode($school_area_positions) !!};

        function updateTagList() {
            const input = document.getElementById('position-input').value.toLowerCase();
            const list = document.getElementById('position-list');
            list.innerHTML = '';

            for (const [id, name] of Object.entries(availableTags)) {
                if (name.toLowerCase().includes(input) && !selectedTags.hasOwnProperty(id)) {
                    const listItem = document.createElement('li');
                    listItem.classList.add('list-group-item');
                    listItem.textContent = name;
                    listItem.dataset.id = id;
                    listItem.onclick = () => selectTag(id, name);
                    list.appendChild(listItem);
                }
            }
        }

        function selectTag(id, name) {
            selectedTags[id] = name;
            document.getElementById('positions').value = Object.keys(selectedTags).join(',');
            document.getElementById('position-input').value = '';
            updateTagList();
            updateSelectedTags();
        }

        function updateSelectedTags() {
            const selectedList = document.getElementById('selected-positions');
            selectedList.innerHTML = '';

            for (const [id, name] of Object.entries(selectedTags)) {
                const listItem = document.createElement('li');
                listItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
                listItem.textContent = name;

                const removeIcon = document.createElement('i');
                removeIcon.classList.add('fa', 'fa-trash', 'text-danger');
                removeIcon.style.cursor = 'pointer';
                removeIcon.onclick = () => removeTag(id);

                listItem.appendChild(removeIcon);
                selectedList.appendChild(listItem);
            }
        }

        function removeTag(id) {
            delete selectedTags[id];
            document.getElementById('positions').value = Object.keys(selectedTags).join(',');
            updateSelectedTags();
            updateTagList();
        }

        document.getElementById('position-input').addEventListener('input', updateTagList);

        window.addTag = function() {
            const tag = document.getElementById('position-input').value.trim();
            const id = Object.keys(availableTags).find(key => availableTags[key].toLowerCase() === tag.toLowerCase());
            if (id && !selectedTags.hasOwnProperty(id)) {
                selectTag(id, availableTags[id]);
            }
        };

        // Inicialno polnjenje seznama izbranih oznak
        updateSelectedTags();
    });
</script>


    <script>
        ClassicEditor.create( document.querySelector( '#description-ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
        <script>
        ClassicEditor.create( document.querySelector( '#description_short-ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection