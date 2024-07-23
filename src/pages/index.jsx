import { Home as HomeIcon, Search, Library, ChevronLeft, ChevronRight, Play,} from 'lucide-react'
import { Sidebar} from '../components/Sidebar'
import { Header } from '../components/Header'

export default function Home() {
  return (
    <div className="h-screen flex flex-col">
        <Header />
      <div className="flex flex-1 border-t border-zinc-600">
        <Sidebar />
        <main className="flex-1 p-6 bg-zinc-950">
          <h1 className='font-semibold text-3xl mt-10 text-white'>Selecione Um ou mais Softwares</h1>
          <div className='grid grid-cols-3 gap-4 mt-4'>
            <div className='bg-white/10 group rounded flex item-center gap-4 overflow-hidden hover:bg-white/20 transition-colors'>
              <strong>CSGO</strong>
              <button className="p-2 rounded-full bg-green-500 text-black ml-auto mr-8 size-10 mt-2 invisible group-hover:visible">
                <Play />
              </button>
            </div>
            <div className='bg-white/10 group rounded flex item-center gap-4 overflow-hidden hover:bg-white/20 transition-colors'>
             
              <strong>EXCEl</strong>
              <button className="p-2 rounded-full bg-green-500 text-black ml-auto mr-8 size-10 mt-2 invisible group-hover:visible">
                <Play />
              </button>
            </div>
            <div className='bg-white/10 group rounded flex item-center gap-4 overflow-hidden hover:bg-white/20 transition-colors'>
              
              <strong>cego</strong>
              <button className="p-2 rounded-full bg-green-500 text-black ml-auto mr-8 size-10 mt-2 invisible group-hover:visible">
                <Play />
              </button>
            </div>
            <div className='bg-white/10 group rounded flex item-center gap-4 overflow-hidden hover:bg-white/20 transition-colors'>
              <strong>Csgo</strong>
              <button className="p-2 rounded-full bg-green-500 text-black ml-auto mr-8 size-10 mt-2 invisible group-hover:visible">
                <Play />
              </button>
            </div>
            <div className='bg-white/10 group rounded flex item-center gap-4 overflow-hidden hover:bg-white/20 transition-colors'>
              <strong>teste</strong>
              <button className="p-2 rounded-full bg-green-500 text-black ml-auto mr-8 size-10 mt-2 invisible group-hover:visible">
                <Play />
              </button>
            </div>
            <div className='bg-white/10 group rounded flex item-center gap-4 overflow-hidden hover:bg-white/20 transition-colors'>
              <strong>teste</strong>
              <button className="p-2 rounded-full bg-green-500 text-black ml-auto mr-8 size-10 mt-2 invisible group-hover:visible">
                <Play />
              </button>
            </div>
          </div>
        </main>
        </div>
    </div>
  )
}