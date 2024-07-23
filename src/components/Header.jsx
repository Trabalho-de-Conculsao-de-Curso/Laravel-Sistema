import { AlignJustify } from 'lucide-react';

export function Header() {
  return (
    <header className="bg-zinc-900 border-t border-zinc-500 p-7 flex items-center">
      <button>
        <AlignJustify className="bg-zinc-600 text-white size-8 p-1 rounded" />
      </button>
      <span className="text-white ml-8">FOR MONKEYS SETUP</span>
      <div className="ml-auto">
        <button className="bg-orange-400 px-6 py-1 rounded text-white text-lg">
          alguma coisa
        </button>
      </div>
    </header>
  );
}
