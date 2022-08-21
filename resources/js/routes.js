//importamos los componentes para el blog
const Mostrar = ()=> import('./components/persona/Mostrar.vue');
const Crear = ()=> import('./components/persona/Crear.vue');
const Editar = ()=> import('./components/persona/Editar.vue');
const projectPersona = ()=> import('./components/persona/project/Mostrar.vue');


export const routes = [
    {
        name: 'mostrarPersonas',
        path: '/home',
        component:Mostrar
    },
    {
        name: 'crearPersona',
        path: '/home/crear',
        component:Crear
    },
    {
        name: 'editarPersona',
        path: '/home/editar/:id',
        component:Editar
    },
       {
        name: 'projectPersona',
        path: '/home/projects/:id',
        component:projectPersona
    },
];
