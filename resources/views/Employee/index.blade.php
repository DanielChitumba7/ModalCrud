<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Empregados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">CRUD de Empregados</h2>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Adicionar Empregado</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Posição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->position }}</td>
                <td>
                    <button class="btn btn-info btn-sm" onclick="showEmployee({{ $employee->id }})">Mostrar</button>
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateemployeeModal{{ $employee->id }}">Editar</button>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$employees->links()}}
</div>

<!-- Add Employee Modal -->

@include('Employee.create')

<!--End Add Modal-->

<!-- Show/Edit Employee Modal -->
@foreach ($employees as $employe)
<div class="modal fade" id="updateemployeeModal{{$employe->id}}" tabindex="-1" aria-labelledby="updateemployeeModalLabel{{$employe->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="employeeForm" method="POST" action="{{route('employees.update',$employe->id)}}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateemployeeModalLabel{{$employe->id}}">Detalhes do Empregado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="employee_id" name="id">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="edit_name" name="name" value="{{$employe->name}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" value="{{$employe->email}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_position" class="form-label">Posição</label>
                        <input type="text" class="form-control" id="edit_position" name="position" value="{{$employe->position}}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

   

</script>
</body>
</html>
