import Pdf from '../components/Link/Index'
import CreateEdit from "../components/Link/CreateEdit";

const routes = [
  {
    path: '/links',
    name: 'link.index',
    component: Pdf
  },
  {
    meta: {
      title: 'Add Link',
    },
    path: '/links/create',
    name: 'link.create',
    component: CreateEdit
  },
  {
    meta: {
      title: 'Update Pdf',
    },
    path: '/links/:id',
    name: 'link.edit',
    component: CreateEdit
  },
]

export default routes