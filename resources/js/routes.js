//importamos los componentes para el blog
const Mostrar = ()=> import('./components/persona/Mostrar.vue');
const Crear = ()=> import('./components/persona/Crear.vue');
const Editar = ()=> import('./components/persona/Editar.vue');
const projectPersona = ()=> import('./components/persona/project/Mostrar.vue');
const socialPersona = ()=> import('./components/persona/social/Mostrar.vue');
const skillPersona = ()=> import('./components/persona/skill/Mostrar.vue');
const detailProject = ()=> import('./components/persona/project/detail/Mostrar.vue');


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
    {
        name: 'socialPersona',
        path: '/home/socials/:id',
        component:socialPersona
    },
    {
        name: 'skillPersona',
        path: '/home/skills/:id',
        component:skillPersona
    },
    {
        name: 'detailProject',
        path: '/home/project/details/:id',
        component:detailProject
    },
];
