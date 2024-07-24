import { AlignJustify } from 'lucide-react';
import '../index.css';

export function Header() {
  return (
    <header className="bg-zinc-900 p-5 flex items-center">
      <button>
        <AlignJustify className="bg-zinc-800 text-white size-8 p-1 rounded" />
      </button>
      <span className="text-white ml-8 font-bold" style={{fontFamily: 'Permanent Marker'}}>4 MONKEYS SETUP</span>
      <div className="ml-auto" >
        <button className="bg-purple-600 px-8 py-2 rounded text-white text-lg relative font-bold">
          Alguma coisa
        </button>
      </div>
    </header>
  );
}
