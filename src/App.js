import React from 'react';
// Importing the Context Provider & Home Component
import ContextProvider from './context/Context';
import Home from './Components/Home'

function App() {
    return (
        <ContextProvider>
            <Home/>
        </ContextProvider>
    );
}

export default App;