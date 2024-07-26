import { useState, useEffect } from 'react';
import { Home as HomeIcon, Search, Library, ChevronLeft, ChevronRight, Play, } from 'lucide-react';
import { Sidebar } from '../components/Sidebar';
import { Header } from '../components/Header';

export default function Home() {
  const [isSidebarVisible, setIsSidebarVisible] = useState(true);

  // Use effect to update sidebar visibility based on screen size
  useEffect(() => {
    const handleResize = () => {
      if (window.innerWidth < 768) {
        setIsSidebarVisible(false);
      } else {
        setIsSidebarVisible(true);
      }
    };

    window.addEventListener('resize', handleResize);

    // Initial check
    handleResize();

    // Cleanup
    return () => {
      window.removeEventListener('resize', handleResize);
    };
  }, []);

  return (
    <div className="h-screen flex flex-col">
      <Header />
      <div className="flex flex-1 border-t border-zinc-800">
        {isSidebarVisible && <Sidebar />}
        <main className="flex-1 p-6 bg-neutral-900">
          <h1 className="font-semibold text-3xl mt-10 text-white">Selecione Um ou mais Softwares</h1>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-10 mx-auto max-w-6xl">
            <div className="bg-zinc-800 group rounded flex items-center justify-center gap-4 overflow-hidden hover:bg-white/20 transition-colors text-white border border-zinc-700">
              <strong>Jogos</strong>
            </div>
            <div className="bg-zinc-800 group rounded flex items-center justify-center gap-4 overflow-hidden hover:bg-white/20 transition-colors text-white border border-zinc-700">
              <strong>PROGRAMAS</strong>
            </div>
            <div className="bg-zinc-800 group rounded flex items-center justify-center gap-4 overflow-hidden hover:bg-white/20 transition-colors text-white border border-zinc-700">
              <strong>Cego</strong>
            </div>
          </div>
        </main>
      </div>
    </div>
  );
}
