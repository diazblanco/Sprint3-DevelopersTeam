<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>entasca't</title>
</head>
<body>
    <div class="container max-w-7xl mx-auto mt-8">
    <div class="mb-4">
        <h1 class=" font-sans text-3xl font-bold text-cyan-700"> Llistat de tasques</h1>
        <div class="flex justify-end">
        <!-- Cajetín búsqueda -->
            <input type="search" name="llistar" placeholder="Cercar tasques" class="px-4 py-2 mr-5 rounded-md  bg-slate-50 text-cyan-700" ></input>
        <!--  botón Nueva tarea-->
            <a href="create"><input type="submit" name="crear" value="Nova tasca" class="px-4 py-2 rounded-md bg-cyan-700 text-white hover:bg-cyan-800" ></input></a>
        </div>
    </div>
<!-- Estructura vsita principal-->
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
            <table class="min-w-full">
            <thead>
                <tr>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-cyan-800 uppercase border-b border-gray-200 bg-cyan-50">
                    Nom tasca
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-cyan-800 uppercase border-b border-gray-200 bg-cyan-50">
                    Tasca creada per
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-cyan-800 uppercase border-b border-gray-200 bg-cyan-50">
                    Estat de la tasca
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-cyan-800 uppercase border-b border-gray-200 bg-cyan-50">
                    Data / Hora inici
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-cyan-800 uppercase border-b border-gray-200 bg-cyan-50">
                    Data / Hora finalització
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-cyan-800 uppercase border-b border-gray-200 bg-cyan-50" colspan="3">
                    Accions
                </th>
                </tr>
            </thead>
        <!-- Imprimimos las tareas existentes en la bbdd mdiante un buble foreach. -->
            <tbody class="bg-white">
            <?php if (isset($tasksList)){
                //echo "No hi ha tasques per mostrar";} else {
                foreach ($tasksList as $task): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">
                            <?php echo $task['nomtasca']; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">
                            <?php echo $task['nomusuari']; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">
                            <?php echo $task['estattasca']; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <span class="text-sm leading-5 text-gray-900">
                            <?php echo $task['horainici']; ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <span class="text-sm leading-5 text-gray-900">
                            <?php echo $task['horafinal']; ?>
                            </span>
                        </td>
                    <!-- botón atualizar--> 
                    <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                        <form action="update" method="post">
                            <input type="hidden" name='nomtasca' value="<?php echo $task['nomtasca']; ?>">
                            <input type="hidden" name='nomusuari' value="<?php echo $task['nomusuari']; ?>">
                            <input type="hidden" name='estattasca' value="<?php echo $task['estattasca']; ?>">
                            <input type="hidden" name='horainici' value="<?php echo $task['horainici']; ?>">
                            <input type="hidden" name='horafinal' value="<?php echo $task['horafinal']; ?>">
                            <input type="hidden" name='id' value="<?php echo $task['id']; ?>">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-cyan-700 hover:text-cyan-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                    <!-- botón eliminar -->
                        <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                            <form action="delete" method="post">
                            <input type="hidden" name='id' value="<?php echo $task['id']; ?>">
                            <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-rose-700 hover:text-rose-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                            </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;} else {echo '<h3 class=" font-sans text-1xl font-bold text-rose-700"> No hi ha tasques per mostrar</h3>';} ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</body>
</html>



