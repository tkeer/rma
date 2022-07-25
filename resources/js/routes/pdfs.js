import Pdf from '../components/Pdf/Index'
import CreateEdit from "../components/Pdf/CreateEdit";

const routes = [
  {
    path: '',
    name: 'home',
    component: Pdf
  },
  {
    meta: {
      title: 'Add Pdf',
    },
    path: '/pdfs/create',
    name: 'pdf.create',
    component: CreateEdit
  },
  {
    meta: {
      title: 'Update Pdf',
    },
    path: '/pdfs/:id',
    name: 'pdf.edit',
    component: CreateEdit
  },
]

export default routes