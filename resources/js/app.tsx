import React from 'react';
import { createRoot } from 'react-dom/client';
import TextContent from './components/TextContent';
import HeroText from './components/HeroText';

const textContentRoot = document.getElementById('text-content-root');
if (textContentRoot) {
    createRoot(textContentRoot).render(<TextContent />);
}

const heroTextRoot = document.getElementById('hero-text-root');
if (heroTextRoot) {
    createRoot(heroTextRoot).render(<HeroText />);
} 