@extends('dashboard.admin')

@section('title')
    <h1 class="text-center container "> LES DEMANDS</h1> 
@endsection
@section('content4')

@if(session('message'))
    <div class="alert alert-success text-center">{{ session('message') }}</div>
@endif 


<table class="table table-striped container mt-5">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nom de Société</th>
            <th scope="col">contrat</th>
            <th scope="col">Salaire</th>
            <th scope="col">détails</th>
            <th scope="col">etat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($demands as $offre)
        @php
        $etatt=$offre->etat;
        @endphp
        <tr>
            <td>{{$offre->id}}</td>
            <td>{{$offre->user->nom_societe}}</td>
            <td>{{$offre->type_contrat}}</td>
            <td>{{$offre->salaire}}</td>
            <td><a href="{{route('demand.edit', $offre->id)}}" class="px-4 btn btn-success">détails</a></td>
            <td>
                <form id="myForm{{$offre->id}}" method="POST" action="{{ route('demand.update', $offre->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
             
                        <div class="col-md-6">
                        <select id="myDropdown{{$offre->id}}" class="form-control" name="etat" autocomplete="current-niveau_etude">
    @foreach($etats as $etat)
    <option value="{{$etat}}" @if(strcmp($etat, $etatt) === 0) selected @endif>{{$etat}}</option>
    @endforeach
</select>

                        </div>
                    </div>
                </form>
            </td>
        </tr>

        
<script>

document.getElementById("myDropdown{{$offre->id}}").addEventListener("change", function() {
    var selectedOption = this.value;
    var form = document.getElementById("myForm{{$offre->id}}");

    // Create a new FormData object
    var formData = new FormData(form);

    // Append the selected option value to the FormData object
    formData.append("selectedOption", selectedOption);

    // Send an AJAX request to save the selected option
    var xhr = new XMLHttpRequest();
    xhr.open("POST", form.action, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send(formData);
});

</script>

        @endforeach
    </tbody>
</table>


@endsection 







