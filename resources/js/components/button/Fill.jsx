import React from "react"
import {Button} from '@chakra-ui/react'

export default function FillButton({name, onClick}){
  return (
    <Button bg='#11047A' color='white' _hover={{ bg: '#12038c'}} size="md" onClick={onClick}>{name}</Button>
  )
}