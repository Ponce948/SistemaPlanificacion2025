<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl text-center">
        Registrar proyecto de inversión
    </h2>
</div>

<div class="w-full max-w-xl mx-auto">
    <form method="POST" action="/proyectos/store">
        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Nombre del proyecto</label>
            <div class="mt-2">
                <input 
                    type="text" 
                    name="nombre" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900" 
                    value="<?= $_POST['nombre'] ?? '' ?>">
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Tipología de intervención</label>
            <div class="mt-2">
                <input 
                    type="text" 
                    name="tipologia" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900" 
                    placeholder="Según clasificación del PND"
                    value="<?= $_POST['tipologia'] ?? '' ?>">
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Entidad responsable</label>
            <div class="mt-2">
                <input 
                    type="text" 
                    name="entidad" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900" 
                    value="<?= $_POST['entidad'] ?? '' ?>">
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Estado</label>
            <div class="mt-2">
                <select 
                    name="estado" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900"
                >
                    <option value="PLANIFICADO" <?= (($_POST['estado'] ?? '') === 'PLANIFICADO') ? 'selected' : '' ?>>
                        Planificado
                    </option>
                    <option value="EJECUCION" <?= (($_POST['estado'] ?? '') === 'EJECUCION') ? 'selected' : '' ?>>
                        En ejecución
                    </option>
                    <option value="FINALIZADO" <?= (($_POST['estado'] ?? '') === 'FINALIZADO') ? 'selected' : '' ?>>
                        Finalizado
                    </option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="w-full rounded-md bg-indigo-600 hover:bg-indigo-500 text-white px-3 py-2 text-center text-sm font-semibold">
                Guardar &rarr;
            </button>
        </div>
    </form>

    <?php if (!empty($errors)): ?>
    <ul class="mt-4 text-red-500">
        <?php foreach ($errors as $error): ?>
        <li class="text-xs">&rarr; <?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
