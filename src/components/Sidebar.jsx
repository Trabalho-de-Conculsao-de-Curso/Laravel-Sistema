import { Home as HomeIcon, Search, Library, ChevronLeft, ChevronRight, Play,} from 'lucide-react'

export function Sidebar() {
    return(
        <aside className="w-72 bg-zinc-950 p-6 border border-zinc-600">
          <nav className="space-y-5 text-orange-400">
            <button className="flex items-center gap-3 text-xs font-semibold text-zinc-200">
              <HomeIcon className='text-orange-400'/>
              HOME
            </button>
            <button className="flex items-center gap-3 text-xs font-semibold text-zinc-200 ">
              <Search className='text-orange-400'/>
              PROCURAR
            </button>
            <button className="flex items-center gap-3 text-xs font-semibold text-zinc-200">
              <Library className='text-orange-400'/>
              SEU HISTORICO 
            </button>
          </nav>
          <nav className="mt-10 pt-10 border-t border-zinc-800 flex flex-col gap-2">
         </nav>
        </aside>
    )

}