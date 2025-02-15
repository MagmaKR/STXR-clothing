import React from 'react';
import { motion } from 'framer-motion';

export default function HeroText() {
  const scrollToLatestDrops = (e: React.MouseEvent) => {
    e.preventDefault();
    const latestDrops = document.getElementById('latest-drops');
    if (latestDrops) {
      latestDrops.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
      });
    }
  };

  return (
    <div id="moving-text" className="text-white text-center logo-3d">
      <motion.h1 
        initial={{ y: 100, opacity: 0 }}
        animate={{ y: 0, opacity: 1 }}
        transition={{ duration: 0.8, delay: 0.2 }}
        className="text-[200px] font-black mb-6 brand-font leading-none tracking-tight text-white"
      >
        STXR
      </motion.h1>
      <motion.p 
        initial={{ y: 100, opacity: 0 }}
        animate={{ y: 0, opacity: 1 }}
        transition={{ duration: 0.8, delay: 0.4 }}
        className="text-4xl mb-10 font-bold text-gray-200"
      >
        STYLE THAT <span className="text-slate-400">SPEAKS</span> VOLUME
      </motion.p>
      <motion.a 
        initial={{ y: 100, opacity: 0 }}
        animate={{ y: 0, opacity: 1 }}
        transition={{ duration: 0.8, delay: 0.6 }}
        href="#latest-drops"
        onClick={scrollToLatestDrops}
        className="inline-block border border-white text-white px-8 py-4 font-bold text-lg hover:bg-white hover:text-black transition duration-300"
      >
        SHOP NOW →
      </motion.a>
    </div>
  );
}