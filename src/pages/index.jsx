import { Home as HomeIcon, Search, Library, ChevronLeft, ChevronRight, Play,} from 'lucide-react'
import { Sidebar} from '../components/Sidebar'
import { Header } from '../components/Header'

export default function Home() {
  return (
    <div className="h-screen flex flex-col">
        <Header />
      <div className="flex flex-1 border-t border-zinc-800">
        <Sidebar />
        <main className="flex-1 p-6 bg-neutral-900 ">
          <h1 className='font-semibold text-3xl mt-10 text-white'>Selecione Um ou mais Softwares</h1>
          <div className='grid grid-cols-3 gap-4 mt-20 h-[500px] w-[1000px] ml-[300px]'>
            
            <div className='bg-zinc-800 group rounded flex item-center gap-4 overflow-hidden hover:bg-white/20 transition-colors text-white border border-zinc-700'>
              <strong className='ml-[200px]'>Jogos</strong>
              
            </div>
            <div className='bg-zinc-800 group rounded flex item-center gap-4 overflow-hidden hover:bg-white/20 transition-colors  border border-zinc-700'>
              <strong className='ml-[200px]'>PROGRAMAS</strong>
            </div>
            <div className='bg-zinc-800 group rounded flex item-center gap-4 overflow-hidden hover:bg-white/20 transition-colors border border-zinc-700'>           
              <strong className='ml-[230px]'>cego</strong>           
            </div>        
          </div>
        </main>
        </div>
    </div>
  )
}