const List = () => import('./components/order/List.vue' /* webpackChunkName: "resource/js/components/order/list" */)
const Add = () => import('./components/order/Add.vue' /* webpackChunkName: "resource/js/components/order/add" */)
const Edit = () => import('./components/order/Edit.vue' /* webpackChunkName: "resource/js/components/caordertegory/edit" */)

export const routes = [
    {
        name: 'Orders',
        path: '/orders',
        component: List
    },
    {
        name: 'Edit',
        path: '/order/:id/edit',
        component: Edit
    },
    {
        name: 'Add',
        path: '/order/add',
        component: Add
    }
]