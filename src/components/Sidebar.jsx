import { Home as HomeIcon, Search, Library, ChevronLeft, ChevronRight, Play,} from 'lucide-react'

export function Sidebar() {
    return(
        <aside className="w-60 bg-neutral-900 p-6 border-r border-zinc-800">
          <nav className="space-y-5 text-orange-400">
            <button className="flex items-center gap-3 text-xs font-semibold text-zinc-200">
              <HomeIcon className='text-purple-600'/>
              HOME
            </button>
            <button className="flex items-center gap-3 text-xs font-semibold text-zinc-200 ">
              <Search />
              PROCURAR
            </button>
            <button className="flex items-center gap-3 text-xs font-semibold text-zinc-200">
              <Library/>
              SEU HISTORICO 
            </button>
          </nav>
          <nav className="mt-10 pt-10 border-t border-zinc-800 flex flex-col gap-2">
         </nav>
        </aside>
    )

}