//importamos los componentes para el blog
const ShowAll = ()=> import('./components/persona/ShowAll.vue');
const Create = ()=> import('./components/persona/Create.vue');
const Edit = ()=> import('./components/persona/Edit.vue');

const SocialPersona = ()=> import('./components/persona/social/ShowAll.vue');
const SocialPersonaCreate = ()=> import('./components/persona/social/Create.vue');
const SocialPersonaEdit = ()=> import('./components/persona/social/Edit.vue');

const SkillPersona = ()=> import('./components/persona/skill/ShowAll.vue');
const SkillPersonaCreate = ()=> import('./components/persona/skill/Create.vue');
const SkillPersonaEdit = ()=> import('./components/persona/skill/Edit.vue');

const ProjectPersona = ()=> import('./components/persona/project/ShowAll.vue');
const ProjectPersonaCreate = ()=> import('./components/persona/project/Create.vue');
const ProjectPersonaEdit = ()=> import('./components/persona/project/Edit.vue');

const DetailProject = ()=> import('./components/persona/project/detail/ShowAll.vue');
const DetailProjectCreate = ()=> import('./components/persona/project/detail/Create.vue');
const DetailProjectEdit = ()=> import('./components/persona/project/detail/Edit.vue');

const Index = ()=> import('./components/Index.vue');
const NotFound = ()=> import('./components/404.vue');
const Login = ()=> import('./components/auth/Login.vue');
const Register = ()=> import('./components/auth/Register.vue');

export const routes = [
    {
        name: 'index',
        path: '/',
        component:Index,
        meta:{
            requiresAuth:false
        }
    },
    {
        name: 'notFound',
        path: '/:pathMatch(.*)*',
        component:NotFound,
    },
    {
        name: 'login',
        path: '/auth/login',
        component:Login,
        meta:{
            requiresAuth:false
        }
    },
    {
        name: 'register',
        path: '/auth/register',
        component:Register,
        meta:{
            requiresAuth:false
        }
    },
    {
        name: 'showPersonas',
        path: '/home',
        component:ShowAll,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'createPersona',
        path: '/home/create',
        component:Create,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'editPersona',
        path: '/home/edit/:personaID',
        component:Edit,
        meta:{
            requiresAuth:true
        }
    },
       {
        name: 'projectPersona',
        path: '/home/projects/:personaID',
        component:ProjectPersona,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'createPersonaProject',
        path: '/home/project/create/:personaID',
        component:ProjectPersonaCreate,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'editPersonaProject',
        path: '/home/project/edit/:projectID/:personaID',
        component:ProjectPersonaEdit,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'socialPersona',
        path: '/home/socials/:personaID',
        component:SocialPersona,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'createPersonaSocial',
        path: '/home/social/create/:personaID',
        component:SocialPersonaCreate,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'editPersonaSocial',
        path: '/home/social/edit/:socialID/:personaID',
        component:SocialPersonaEdit,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'skillPersona',
        path: '/home/skills/:personaID',
        component:SkillPersona,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'createPersonaSkill',
        path: '/home/skill/create/:personaID',
        component:SkillPersonaCreate,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'editPersonaSkill',
        path: '/home/skill/edit/:skillID/:personaID',
        component:SkillPersonaEdit,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'detailProject',
        path: '/home/project/details/:projectID/:personaID',
        component:DetailProject,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'createProjectDetail',
        path: '/home/project/detail/create/:projectID/:personaID',
        component:DetailProjectCreate,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'editProjectDetail',
        path: '/home/project/detail/edit/:detailID/:projectID/:personaID',
        component:DetailProjectEdit,
        meta:{
            requiresAuth:true
        }
    },
];
