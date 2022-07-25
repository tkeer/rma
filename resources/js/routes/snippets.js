import Index from '../components/HtmlSnippet/Index'
import CreateEdit from "../components/HtmlSnippet/CreateEdit";

const routes = [
  {
    path: '/snippets',
    name: 'snippet.index',
    component: Index
  },
  {
    meta: {
      title: 'Add Snippet',
    },
    path: '/snippets/create',
    name: 'snippet.create',
    component: CreateEdit
  },
  {
    meta: {
      title: 'Update Snippet',
    },
    path: '/snippets/:id',
    name: 'snippet.edit',
    component: CreateEdit
  },
]

export default routes