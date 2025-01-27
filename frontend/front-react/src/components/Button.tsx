import Link from 'next/link';

interface ButtonProps {
  href: string;
  children: React.ReactNode;
  className?: string;
}

export default function Button({ href, children, className }: ButtonProps) {
  return (
    <Link href={href} className={`font-bold py-2 px-4 rounded transition duration-300 ${className}`}>
      {children}
    </Link>
  );
}
