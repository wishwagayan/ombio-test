import React from 'react';
// Importing the Context Provider & Home Component
import ContextProvider from './ui/context/Context';
import Home from './ui/Components/Home'

function App() {
    return (
        <ContextProvider>
            <Home/>
        </ContextProvider>
    );
}

export default App;