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
const DetailProject = ()=> import('./components/persona/project/detail/ShowAll.vue');


export const routes = [
    {
        name: 'showPersonas',
        path: '/home',
        component:ShowAll
    },
    {
        name: 'createPersona',
        path: '/home/create',
        component:Create
    },
    {
        name: 'editPersona',
        path: '/home/edit/:id',
        component:Edit
    },
       {
        name: 'projectPersona',
        path: '/home/projects/:id',
        component:ProjectPersona
    },
    {
        name: 'socialPersona',
        path: '/home/socials/:id',
        component:SocialPersona
    },
    {
        name: 'createPersonaSocial',
        path: '/home/social/create',
        component:SocialPersonaCreate
    },
    {
        name: 'editPersonaSocial',
        path: '/home/social/edit/:id',
        component:SocialPersonaEdit
    },
    {
        name: 'skillPersona',
        path: '/home/skills/:id',
        component:SkillPersona
    },
    {
        name: 'createPersonaSkill',
        path: '/home/skill/create',
        component:SkillPersonaCreate
    },
    {
        name: 'editPersonaSkill',
        path: '/home/skill/edit/:id',
        component:SkillPersonaEdit
    },
    {
        name: 'detailProject',
        path: '/home/project/details/:id',
        component:DetailProject
    },
];
