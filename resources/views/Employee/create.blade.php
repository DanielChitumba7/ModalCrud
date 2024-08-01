<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="addEmployeeForm" method="POST" action="{{route('employees.store',$employee->id)}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Adicionar Empregado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Posição</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-primary" value="Salvar">
                   
                </div>
            </form>
        </div>
    </div>
</div>