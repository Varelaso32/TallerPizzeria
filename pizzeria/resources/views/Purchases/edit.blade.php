<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Editar Compra</h1>
        </div>

        <form method="POST" action="{{ route('purchases.update', ['purchase' => $purchase->id]) }}">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" disabled value="{{ $purchase->id }}">
                <div class="form-text">ID de la compra.</div>
            </div>

            <div class="mb-3">
                <label for="supplier_id" class="form-label">Proveedor</label>
                <select class="form-select" id="supplier_id" name="supplier_id" required>
                    <option selected disabled value="">Seleccione un proveedor...</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $supplier->id == $purchase->supplier_id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="raw_material_id" class="form-label">Materia Prima</label>
                <select class="form-select" id="raw_material_id" name="raw_material_id" required>
                    <option selected disabled value="">Seleccione una materia prima...</option>
                    @foreach ($rawMaterials as $rawMaterial)
                        <option value="{{ $rawMaterial->id }}" {{ $rawMaterial->id == $purchase->raw_material_id ? 'selected' : '' }}>
                            {{ $rawMaterial->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required value="{{ $purchase->quantity }}">
            </div>

            <div class="mb-3">
                <label for="purchase_price" class="form-label">Precio de Compra</label>
                <input type="number" class="form-control" id="purchase_price" name="purchase_price" required value="{{ $purchase->purchase_price }}">
            </div>

            <div class="mb-3">
                <label for="purchase_date" class="form-label">Fecha de Compra</label>
                <input type="date" class="form-control" id="purchase_date" name="purchase_date" required value="{{ $purchase->purchase_date }}">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('purchases.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
